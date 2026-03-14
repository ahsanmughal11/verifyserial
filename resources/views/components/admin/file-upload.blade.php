@props([
    'name',
    'label' => '',
    'accept' => 'image/*',
    'currentImage' => null,
    'hint' => 'Drag & drop or click to upload. Max 5MB.',
])

@php
    $componentId = 'fu-' . str_replace(['[', ']', '.'], '-', $name) . '-' . uniqid();
@endphp

<div x-data="{
    preview: '{{ $currentImage ? asset($currentImage) : '' }}',
    fileName: '',
    dragging: false,
    handleFile(file) {
        if (!file) return;
        this.fileName = file.name;
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => { this.preview = e.target.result; };
            reader.readAsDataURL(file);
        }
    },
    clearFile() {
        this.preview = '{{ $currentImage ? asset($currentImage) : '' }}';
        this.fileName = '';
        this.$refs.fileInput.value = '';
    }
}" class="relative" id="{{ $componentId }}">

    @if($label)
        <label class="block mb-2 text-sm text-[#ccc] font-semibold">{{ $label }}</label>
    @endif

    {{-- Upload area --}}
    <div @click="$refs.fileInput.click()"
         @dragover.prevent="dragging = true"
         @dragleave.prevent="dragging = false"
         @drop.prevent="dragging = false; handleFile($event.dataTransfer.files[0]); $refs.fileInput.files = $event.dataTransfer.files"
         :class="dragging ? 'border-[#ffd700] bg-[rgba(255,215,0,0.05)]' : 'border-[#2a2a2a] hover:border-[#444]'"
         class="w-full border-2 border-dashed rounded-lg bg-[#151515] transition-all duration-300 cursor-pointer overflow-hidden">

        {{-- Preview or placeholder --}}
        <div x-show="preview" class="relative">
            <img :src="preview" class="w-full h-48 object-contain bg-[#0a0a0a] p-2" alt="Preview" />
            <button @click.stop="clearFile()" type="button"
                    class="absolute top-2 right-2 w-7 h-7 bg-[rgba(0,0,0,0.7)] hover:bg-[#ff6b6b] text-white border-none rounded-full cursor-pointer flex items-center justify-center transition-all duration-200">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
            </button>
            <div x-show="fileName" class="py-2 px-3 bg-[#0a0a0a] border-t border-[#2a2a2a]">
                <span class="text-xs text-[#888]" x-text="fileName"></span>
            </div>
        </div>

        <div x-show="!preview" class="py-10 px-6 flex flex-col items-center gap-3">
            <div class="w-14 h-14 rounded-full bg-[rgba(255,215,0,0.1)] flex items-center justify-center">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" class="text-[#ffd700]">
                    <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                </svg>
            </div>
            <div class="text-center">
                <p class="text-sm text-[#ccc] mb-1">
                    <span class="text-[#ffd700] font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-[#666]">{{ $hint }}</p>
            </div>
        </div>
    </div>

    <input x-ref="fileInput"
           @change="handleFile($event.target.files[0])"
           type="file"
           name="{{ $name }}"
           accept="{{ $accept }}"
           class="hidden" />
</div>
