<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'meta_title',
        'meta_description',
        'status',
        'publish_date',
        'user_id',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    protected $appends = [
        'content_html',
    ];

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post): void {
            $base = $post->slug ?: $post->title;
            $post->slug = static::generateUniqueSlug($base, $post->id);
        });
    }

    public static function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $slug = $slug !== '' ? $slug : 'post';
        $original = $slug;
        $counter = 1;

        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn (Builder $query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_post_blog_category');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_blog_tag');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->whereNotNull('publish_date')
            ->where('publish_date', '<=', now());
    }

    public function getContentHtmlAttribute(): string
    {
        return static::renderEditorJsonToHtml($this->content ?? '');
    }

    public static function extractPlainTextFromContent(string $jsonContent): string
    {
        $decoded = json_decode($jsonContent, true);

        if (!is_array($decoded) || !isset($decoded['blocks']) || !is_array($decoded['blocks'])) {
            return trim(strip_tags($jsonContent));
        }

        $parts = [];

        foreach ($decoded['blocks'] as $block) {
            $type = $block['type'] ?? '';
            $data = $block['data'] ?? [];

            if (in_array($type, ['paragraph', 'header', 'quote', 'warning'], true)) {
                $text = trim(strip_tags((string) ($data['text'] ?? $data['message'] ?? '')));
                if ($text !== '') {
                    $parts[] = $text;
                }
            }

            if ($type === 'list' && isset($data['items']) && is_array($data['items'])) {
                $items = static::flattenListItems($data['items']);
                foreach ($items as $item) {
                    $clean = trim(strip_tags((string) $item));
                    if ($clean !== '') {
                        $parts[] = $clean;
                    }
                }
            }

            if ($type === 'table' && isset($data['content']) && is_array($data['content'])) {
                foreach ($data['content'] as $row) {
                    if (is_array($row)) {
                        foreach ($row as $cell) {
                            $clean = trim(strip_tags((string) $cell));
                            if ($clean !== '') {
                                $parts[] = $clean;
                            }
                        }
                    }
                }
            }
        }

        return trim(implode(' ', $parts));
    }

    public static function renderEditorJsonToHtml(string $jsonContent): string
    {
        $decoded = json_decode($jsonContent, true);

        if (!is_array($decoded) || !isset($decoded['blocks']) || !is_array($decoded['blocks'])) {
            return $jsonContent;
        }

        $html = [];

        foreach ($decoded['blocks'] as $block) {
            $type = $block['type'] ?? '';
            $data = $block['data'] ?? [];

            if ($type === 'paragraph') {
                $html[] = '<p>' . ($data['text'] ?? '') . '</p>';
                continue;
            }

            if ($type === 'header') {
                $level = (int) ($data['level'] ?? 2);
                $level = max(1, min(6, $level));
                $html[] = '<h' . $level . '>' . ($data['text'] ?? '') . '</h' . $level . '>';
                continue;
            }

            if ($type === 'list') {
                $style = ($data['style'] ?? 'unordered') === 'ordered' ? 'ol' : 'ul';
                $items = isset($data['items']) && is_array($data['items']) ? static::flattenListItems($data['items']) : [];
                $listItems = array_map(fn ($item) => '<li>' . $item . '</li>', $items);
                $html[] = '<' . $style . '>' . implode('', $listItems) . '</' . $style . '>';
                continue;
            }

            if ($type === 'quote') {
                $caption = trim((string) ($data['caption'] ?? ''));
                $captionHtml = $caption !== '' ? '<cite>' . e($caption) . '</cite>' : '';
                $html[] = '<blockquote><p>' . ($data['text'] ?? '') . '</p>' . $captionHtml . '</blockquote>';
                continue;
            }

            if ($type === 'code') {
                $code = e((string) ($data['code'] ?? ''));
                $html[] = '<pre><code>' . $code . '</code></pre>';
                continue;
            }

            if ($type === 'delimiter') {
                $html[] = '<hr>';
                continue;
            }

            if ($type === 'image') {
                $url = (string) Arr::get($data, 'file.url', '');
                if ($url !== '') {
                    $caption = trim((string) ($data['caption'] ?? ''));
                    $safeUrl = e($url);
                    $safeCaption = e($caption);
                    $captionHtml = $caption !== '' ? '<figcaption>' . $safeCaption . '</figcaption>' : '';
                    $html[] = '<figure><img src="' . $safeUrl . '" alt="' . $safeCaption . '">' . $captionHtml . '</figure>';
                }
                continue;
            }

            if ($type === 'table') {
                $rows = isset($data['content']) && is_array($data['content']) ? $data['content'] : [];
                if (!empty($rows)) {
                    $rowHtml = [];
                    foreach ($rows as $row) {
                        if (is_array($row)) {
                            $cells = array_map(fn ($cell) => '<td>' . e((string) $cell) . '</td>', $row);
                            $rowHtml[] = '<tr>' . implode('', $cells) . '</tr>';
                        }
                    }
                    if (!empty($rowHtml)) {
                        $html[] = '<table><tbody>' . implode('', $rowHtml) . '</tbody></table>';
                    }
                }
                continue;
            }
        }

        return implode("\n", $html);
    }

    private static function flattenListItems(array $items): array
    {
        $flattened = [];

        foreach ($items as $item) {
            if (is_string($item)) {
                $flattened[] = $item;
                continue;
            }

            if (is_array($item)) {
                $content = (string) ($item['content'] ?? '');
                if ($content !== '') {
                    $flattened[] = $content;
                }

                if (isset($item['items']) && is_array($item['items'])) {
                    $flattened = array_merge($flattened, static::flattenListItems($item['items']));
                }
            }
        }

        return $flattened;
    }
}
