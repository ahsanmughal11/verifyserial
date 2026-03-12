@php
    $selectedCategories = old('categories', isset($post) ? $post->categories->pluck('id')->all() : []);
    $selectedTags = old('tags', isset($post) ? $post->tags->pluck('id')->all() : []);

    $contentSource = old('content', $post->content ?? '');
    $decodedContent = json_decode($contentSource ?: '', true);
    $initialEditorData = is_array($decodedContent) && isset($decodedContent['blocks'])
        ? $decodedContent
        : ['time' => now()->valueOf(), 'blocks' => []];
@endphp

<div class="mb-6">
    <label for="title" class="block mb-2 text-sm text-[#ccc] font-semibold">Title *</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white" />
</div>

<div class="mb-6">
    <label for="slug" class="block mb-2 text-sm text-[#ccc] font-semibold">Slug</label>
    <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white" />
</div>

<div class="mb-6">
    <label for="excerpt" class="block mb-2 text-sm text-[#ccc] font-semibold">Excerpt</label>
    <textarea id="excerpt" name="excerpt" rows="3" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

<div class="mb-6">
    <label for="content" class="block mb-2 text-sm text-[#ccc] font-semibold">Content *</label>
    <div id="editorjs" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white min-h-[360px] cursor-text"></div>
    <p class="text-xs text-[#888] mt-2">Use the + button in the editor to add headings, lists, images, quotes, code blocks, and tables.</p>
    <input type="hidden" id="content" name="content" value="{{ old('content', $post->content ?? '') }}">
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <label for="featured_image" class="block mb-2 text-sm text-[#ccc] font-semibold">Featured Image</label>
        <input type="file" id="featured_image" name="featured_image" accept="image/*" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white" />
        @if(!empty($post?->featured_image))
            <img src="{{ asset($post->featured_image) }}" alt="Current featured image" class="mt-3 w-36 h-24 object-cover rounded border border-[#2a2a2a]">
        @endif
    </div>

    <div class="mb-6">
        <label for="status" class="block mb-2 text-sm text-[#ccc] font-semibold">Status *</label>
        <select id="status" name="status" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white">
            <option value="draft" {{ old('status', $post->status ?? 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $post->status ?? '') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <label for="publish_date" class="block mb-2 text-sm text-[#ccc] font-semibold">Publish Date</label>
        <input type="datetime-local" id="publish_date" name="publish_date" value="{{ old('publish_date', isset($post) && $post->publish_date ? $post->publish_date->format('Y-m-d\\TH:i') : '') }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white" />
    </div>

    <div class="mb-6">
        <label for="categories" class="block mb-2 text-sm text-[#ccc] font-semibold">Categories</label>
        <select id="categories" name="categories[]" multiple class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white min-h-28">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories, true) ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-6">
    <label for="tags" class="block mb-2 text-sm text-[#ccc] font-semibold">Tags</label>
    <select id="tags" name="tags[]" multiple class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white min-h-28">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags, true) ? 'selected' : '' }}>{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="mb-6">
        <label for="meta_title" class="block mb-2 text-sm text-[#ccc] font-semibold">Meta Title</label>
        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white" />
    </div>

    <div class="mb-6">
        <label for="meta_description" class="block mb-2 text-sm text-[#ccc] font-semibold">Meta Description</label>
        <textarea id="meta_description" name="meta_description" rows="3" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
    </div>
</div>

<div class="flex gap-4 pt-4 border-t border-[#2a2a2a]">
    <button type="submit" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md text-sm font-semibold">{{ $buttonText }}</button>
    <a href="{{ route('admin.blog.posts.index') }}" class="py-3 px-6 border border-[#2a2a2a] text-[#ccc] rounded-md text-sm no-underline">Cancel</a>
</div>

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
        editorHolder.innerHTML = '<div class="text-[#ff6b6b]">Editor failed to load. Please refresh the page and try again.</div>';
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
