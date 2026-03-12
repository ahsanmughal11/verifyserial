<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['categories', 'tags'])
            ->latest()
            ->paginate(10);

        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();
        $tags = BlogTag::orderBy('name')->get();

        return view('admin.blog.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'content' => 'required|json',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5056',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'publish_date' => 'nullable|date',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:blog_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:blog_tags,id',
        ]);

        if (!empty($validated['featured_image'])) {
            $validated['featured_image'] = $this->storeImage($request->file('featured_image'));
        }

        if (empty($validated['excerpt'])) {
            $plainText = BlogPost::extractPlainTextFromContent($validated['content']);
            $validated['excerpt'] = Str::limit($plainText, 220);
        }

        if ($validated['status'] === 'published' && empty($validated['publish_date'])) {
            $validated['publish_date'] = now();
        }

        $validated['user_id'] = Auth::id();

        $post = BlogPost::create($validated);
        $post->categories()->sync($validated['categories'] ?? []);
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.blog.posts.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::orderBy('name')->get();
        $tags = BlogTag::orderBy('name')->get();

        return view('admin.blog.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $post->id,
            'content' => 'required|json',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5056',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'status' => 'required|in:draft,published',
            'publish_date' => 'nullable|date',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:blog_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:blog_tags,id',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete(str_replace('storage/', '', $post->featured_image));
            }

            $validated['featured_image'] = $this->storeImage($request->file('featured_image'));
        }

        if (empty($validated['excerpt'])) {
            $plainText = BlogPost::extractPlainTextFromContent($validated['content']);
            $validated['excerpt'] = Str::limit($plainText, 220);
        }

        if ($validated['status'] === 'published' && empty($validated['publish_date'])) {
            $validated['publish_date'] = $post->publish_date ?: now();
        }

        if ($validated['status'] === 'draft') {
            $validated['publish_date'] = $validated['publish_date'] ?? null;
        }

        $post->update($validated);
        $post->categories()->sync($validated['categories'] ?? []);
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.blog.posts.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $post)
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete(str_replace('storage/', '', $post->featured_image));
        }

        $post->delete();

        return redirect()->route('admin.blog.posts.index')->with('success', 'Blog post deleted successfully.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5056',
        ]);

        $path = $this->storeImage($request->file('file'), 'blog/editor');

        return response()->json([
            'location' => asset($path),
            'success' => 1,
            'file' => [
                'url' => asset($path),
            ],
        ]);
    }

    private function storeImage($file, string $directory = 'blog/featured'): string
    {
        $fileName = time() . '_' . Str::random(8) . '_' . $file->getClientOriginalName();
        Storage::disk('public')->putFileAs($directory, $file, $fileName);

        return 'storage/' . trim($directory, '/') . '/' . $fileName;
    }
}
