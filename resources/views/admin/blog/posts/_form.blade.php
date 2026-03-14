@php
    $selectedCategories = old('categories', isset($post) ? $post->categories->pluck('id')->all() : []);
    $selectedTags = old('tags', isset($post) ? $post->tags->pluck('id')->all() : []);

    $contentSource = old('content', $post->content ?? '');
    $decodedContent = json_decode($contentSource ?: '', true);
    $initialEditorData = is_array($decodedContent) && isset($decodedContent['blocks'])
        ? $decodedContent
        : ['time' => now()->valueOf(), 'blocks' => []];
@endphp

{{-- Title --}}
<div class="mb-6">
    <label for="title" class="block mb-2 text-sm text-[#ccc] font-semibold">Title *</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required
           class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] transition-all" />
</div>

{{-- Slug --}}
<div class="mb-6">
    <label for="slug" class="block mb-2 text-sm text-[#ccc] font-semibold">Slug</label>
    <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
           class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-all" />
</div>

{{-- Excerpt --}}
<div class="mb-6">
    <label for="excerpt" class="block mb-2 text-sm text-[#ccc] font-semibold">Excerpt</label>
    <textarea id="excerpt" name="excerpt" rows="3"
              class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-all">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

{{-- Content (Editor.js) --}}
<div class="mb-6">
    <label class="block mb-2 text-sm text-[#ccc] font-semibold">Content *</label>
    <div class="bg-[#151515] border border-[#2a2a2a] rounded-lg overflow-hidden">
        {{-- Editor toolbar hint --}}
        <div class="flex items-center gap-4 px-4 py-2.5 bg-[#1a1a1a] border-b border-[#2a2a2a] text-xs text-[#888]">
            <span class="flex items-center gap-1.5">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" class="text-[#ffd700]"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                Click <kbd class="px-1.5 py-0.5 bg-[#333] rounded text-[#ffd700] font-mono text-[10px]">+</kbd> or press <kbd class="px-1.5 py-0.5 bg-[#333] rounded text-[#ffd700] font-mono text-[10px]">Tab</kbd> to add blocks
            </span>
            <span class="text-[#555]">|</span>
            <span>Heading • List • Quote • Code • Image • Table • Divider</span>
        </div>
        <div id="editorjs" class="min-h-[360px] cursor-text editor-dark"></div>
    </div>
    <input type="hidden" id="content" name="content" value="{{ old('content', $post->content ?? '') }}">
</div>

{{-- Featured Image & Status --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <x-admin.file-upload
            name="featured_image"
            label="Featured Image"
            accept="image/*"
            :currentImage="$post->featured_image ?? null"
            hint="Drag & drop or click. Max 5MB. JPG, PNG, WebP."
        />
    </div>

    <div class="mb-6">
        <label for="status" class="block mb-2 text-sm text-[#ccc] font-semibold">Status *</label>
        <select id="status" name="status"
                class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-all">
            <option value="draft" {{ old('status', $post->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $post->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
</div>

{{-- Publish Date & Categories --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <x-admin.date-picker
            name="publish_date"
            label="Publish Date"
            :value="old('publish_date', isset($post) && $post->publish_date ? $post->publish_date->format('Y-m-d\TH:i') : '')"
            :showTime="true"
        />
    </div>

    <div class="mb-6">
        <x-admin.searchable-select
            name="categories[]"
            label="Categories"
            :options="$categories"
            :selected="$selectedCategories"
            placeholder="Search categories..."
        />
    </div>
</div>

{{-- Tags --}}
<div class="mb-6">
    <x-admin.searchable-select
        name="tags[]"
        label="Tags"
        :options="$tags"
        :selected="$selectedTags"
        placeholder="Search tags..."
    />
</div>

{{-- SEO --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <label for="meta_title" class="block mb-2 text-sm text-[#ccc] font-semibold">Meta Title</label>
        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
               class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-all" />
    </div>

    <div class="mb-6">
        <label for="meta_description" class="block mb-2 text-sm text-[#ccc] font-semibold">Meta Description</label>
        <textarea id="meta_description" name="meta_description" rows="3"
                  class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-all">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
    </div>
</div>

{{-- Submit --}}
<div class="flex gap-4 pt-4 border-t border-[#2a2a2a]">
    <button type="submit" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md text-sm font-semibold border-none cursor-pointer hover:opacity-90 transition-opacity">{{ $buttonText }}</button>
    <a href="{{ route('admin.blog.posts.index') }}" class="py-3 px-6 border border-[#2a2a2a] text-[#ccc] rounded-md text-sm no-underline hover:bg-[#333] transition-colors">Cancel</a>
</div>

@push('head')
<style>
    /* Editor.js dark theme overrides */
    .editor-dark .ce-block__content,
    .editor-dark .ce-toolbar__content {
        max-width: 100% !important;
        margin: 0 !important;
    }
    .editor-dark .codex-editor {
        padding: 16px 20px;
    }
    .editor-dark .ce-toolbar__plus,
    .editor-dark .ce-toolbar__settings-btn {
        background: #2a2a2a !important;
        color: #ffd700 !important;
        border: 1px solid #333 !important;
        border-radius: 6px !important;
        opacity: 1 !important;
        visibility: visible !important;
        width: 34px !important;
        height: 34px !important;
        transition: all 0.2s ease !important;
    }
    .editor-dark .ce-toolbar__plus:hover,
    .editor-dark .ce-toolbar__settings-btn:hover {
        background: #ffd700 !important;
        color: #1a1a1a !important;
        border-color: #ffd700 !important;
    }
    .editor-dark .ce-toolbar__actions {
        opacity: 1 !important;
    }
    .editor-dark .ce-toolbar {
        opacity: 1 !important;
    }
    .editor-dark .codex-editor--empty .ce-block .ce-paragraph[data-placeholder]:empty::before {
        color: #666 !important;
    }
    .editor-dark .ce-paragraph,
    .editor-dark .ce-header,
    .editor-dark .ce-code__textarea,
    .editor-dark .cdx-quote__text,
    .editor-dark .cdx-quote__caption,
    .editor-dark .tc-cell,
    .editor-dark .cdx-list__item {
        color: #e0e0e0 !important;
    }
    .editor-dark .ce-code__textarea {
        background: #0a0a0a !important;
        border: 1px solid #333 !important;
        border-radius: 6px !important;
    }
    .editor-dark .cdx-quote {
        border-left: 3px solid #ffd700 !important;
    }
    .editor-dark .ce-delimiter::before {
        color: #555 !important;
    }
    .editor-dark .ce-popover {
        background: #1a1a1a !important;
        border: 1px solid #2a2a2a !important;
        box-shadow: 0 8px 24px rgba(0,0,0,0.5) !important;
    }
    .editor-dark .ce-popover-item__title {
        color: #ccc !important;
    }
    .editor-dark .ce-popover-item__icon {
        background: #2a2a2a !important;
        color: #ffd700 !important;
        border: 1px solid #333 !important;
    }
    .editor-dark .ce-popover-item:hover {
        background: rgba(255,215,0,0.1) !important;
    }
    .editor-dark .ce-inline-toolbar {
        background: #1a1a1a !important;
        border: 1px solid #2a2a2a !important;
        color: #ccc !important;
    }
    .editor-dark .ce-inline-toolbar .ce-inline-tool {
        color: #ccc !important;
    }
    .editor-dark .ce-inline-toolbar .ce-inline-tool:hover {
        background: rgba(255,215,0,0.15) !important;
    }
    .editor-dark .ce-inline-toolbar .ce-inline-tool--active {
        color: #ffd700 !important;
    }
    .editor-dark .ce-conversion-toolbar {
        background: #1a1a1a !important;
        border: 1px solid #2a2a2a !important;
    }
    .editor-dark .ce-conversion-tool:hover {
        background: rgba(255,215,0,0.1) !important;
    }
    .editor-dark .ce-conversion-tool__icon {
        background: #2a2a2a !important;
    }
    .editor-dark .tc-wrap {
        --color-border: #333 !important;
    }
    .editor-dark .tc-row::after {
        background: #333 !important;
    }
    .editor-dark .tc-add-column,
    .editor-dark .tc-add-row {
        color: #ffd700 !important;
        border-color: #333 !important;
    }
    .editor-dark .image-tool__caption,
    .editor-dark .image-tool__image {
        background: #0a0a0a !important;
        border: 1px solid #333 !important;
    }
    .editor-dark .cdx-search-field {
        background: #151515 !important;
        border: 1px solid #333 !important;
        color: #ccc !important;
    }
    /* Popover items new version */
    .editor-dark .ce-popover__item-icon {
        background: #2a2a2a !important;
        color: #ffd700 !important;
    }
    .editor-dark .ce-popover__item:hover .ce-popover__item-icon {
        background: rgba(255,215,0,0.2) !important;
    }
</style>
@endpush

@push('scripts')
<script id="editor-initial-data" type="application/json">@json($initialEditorData)</script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script>
    const slugInput = document.getElementById('slug');
    const titleInput = document.getElementById('title');
    const contentInput = document.getElementById('content');
    const editorHolder = document.getElementById('editorjs');

    titleInput?.addEventListener('input', () => {
        if (!slugInput.dataset.touched) {
            slugInput.value = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }
    });

    slugInput?.addEventListener('input', () => {
        slugInput.dataset.touched = '1';
    });

    const initialEditorData = JSON.parse(document.getElementById('editor-initial-data').textContent || '{"blocks":[]}');

    const HeaderTool = window.Header;
    const ListTool = window.EditorjsList || window.List;
    const QuoteTool = window.Quote;
    const CodeBlockTool = window.CodeTool || window.Code;
    const DelimiterTool = window.Delimiter;
    const ImageUploadTool = window.ImageTool;
    const TableTool = window.Table;

    let editor = null;

    if (!window.EditorJS || !HeaderTool || !ListTool || !QuoteTool || !CodeBlockTool || !DelimiterTool || !ImageUploadTool || !TableTool) {
        editorHolder.innerHTML = '<div class="text-[#ff6b6b] p-4">Editor failed to load. Please refresh the page and try again.</div>';
        console.error('Editor.js dependencies missing', {
            editor: !!window.EditorJS,
            header: !!HeaderTool,
            list: !!ListTool,
            quote: !!QuoteTool,
            code: !!CodeBlockTool,
            delimiter: !!DelimiterTool,
            image: !!ImageUploadTool,
            table: !!TableTool,
        });
    } else {
        editor = new EditorJS({
            holder: 'editorjs',
            data: initialEditorData,
            autofocus: false,
            placeholder: 'Start writing your blog post here...',
            tools: {
                header: {
                    class: HeaderTool,
                    inlineToolbar: true,
                    config: {
                        levels: [2, 3, 4],
                        defaultLevel: 2
                    }
                },
                list: {
                    class: ListTool,
                    inlineToolbar: true,
                },
                quote: {
                    class: QuoteTool,
                    inlineToolbar: true,
                },
                code: CodeBlockTool,
                delimiter: DelimiterTool,
                table: TableTool,
                image: {
                    class: ImageUploadTool,
                    config: {
                        uploader: {
                            uploadByFile(file) {
                                const formData = new FormData();
                                formData.append('file', file);

                                return fetch('{{ route("admin.blog.upload-image") }}', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: formData,
                                }).then((response) => response.json());
                            }
                        }
                    }
                }
            }
        });
    }

    const formElement = contentInput.closest('form');
    formElement?.addEventListener('submit', async (event) => {
        if (!editor) {
            event.preventDefault();
            alert('Editor is not loaded yet. Please refresh and try again.');
            return;
        }

        try {
            const output = await editor.save();
            contentInput.value = JSON.stringify(output);
        } catch (error) {
            event.preventDefault();
            alert('Unable to save editor content. Please try again.');
        }
    });
</script>
@endpush
