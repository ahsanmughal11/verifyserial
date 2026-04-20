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

{{-- Content (TinyMCE) --}}
<div class="mb-6">
    <label class="block mb-2 text-sm text-[#ccc] font-semibold">Content *</label>
    <div class="bg-[#151515] rounded-lg overflow-hidden">
        <textarea id="content" name="content" class="w-full h-[400px] hidden">{!! old('content', isset($post) ? $post->content_html : '') !!}</textarea>
    </div>
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
    /* TinyMCE overrides */
    .tox-tinymce {
        border: 1px solid #2a2a2a !important;
        border-radius: 0.5rem !important;
    }
    .tox .tox-toolbar__primary {
        background: #1a1a1a !important;
        border-bottom: 1px solid #2a2a2a !important;
    }
    .tox .tox-editor-header {
        border-bottom: 1px solid #2a2a2a !important;
        box-shadow: none !important;
    }
    .tox .tox-statusbar {
        border-top: 1px solid #2a2a2a !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    const slugInput = document.getElementById('slug');
    const titleInput = document.getElementById('title');

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

    tinymce.init({
        selector: '#content',
        plugins: 'lists link image code table wordcount',
        toolbar: 'blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code',
        skin: 'oxide-dark',
        content_css: 'dark',
        height: 500,
        menubar: false,
        branding: false,
        promotion: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
        images_upload_handler: function (blobInfo, progress) {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route("admin.blog.upload-image") }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                
                xhr.upload.onprogress = (e) => {
                    progress(e.loaded / e.total * 100);
                };
                
                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }
                    try {
                        const json = JSON.parse(xhr.responseText);
                        // Backend returns: {success: 1, file: {url: "..."}}
                        if (!json || !json.file || !json.file.url) {
                            reject('Invalid JSON format: ' + xhr.responseText);
                            return;
                        }
                        resolve(json.file.url);
                    } catch (err) {
                        reject('Error parsing JSON: ' + err.message);
                    }
                };
                
                xhr.onerror = function () {
                    reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };
                
                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                
                xhr.send(formData);
            });
        }
    });
</script>
@endpush
