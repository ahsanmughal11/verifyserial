@extends('layouts.admin')

@section('title', 'Add Featured Product')
@section('page-title', 'Add Featured Product')

@section('breadcrumb')
<span>/</span>
<a href="{{ route('admin.featured-products.index') }}" class="text-[#ffd700] no-underline hover:underline">Featured Products</a>
<span>/</span>
<span class="text-[#888]">Add New</span>
@endsection

@section('header-actions')
<a href="{{ route('admin.featured-products.index') }}" class="text-[#ffd700] no-underline hover:underline flex items-center gap-2 text-sm font-semibold transition-colors duration-300 hover:text-[#d4af37]">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
    </svg>
    Back to List
</a>
@endsection

@section('content')
<div class="max-w-2xl">
    @if ($errors->any())
        <div class="bg-[rgba(255,107,107,0.1)] border border-[#ff6b6b] text-[#ff6b6b] px-5 py-4 rounded-md mb-6">
            <ul class="list-disc ml-5 m-0 p-0 text-sm">
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.featured-products.store') }}" method="POST" enctype="multipart/form-data" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-8 shadow-lg">
        @csrf

        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-[#cccccc] mb-2 uppercase tracking-wide">Product Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" 
                   class="w-full bg-[#0a0a0a] border border-[#333] text-white p-3.5 rounded-md text-base transition-all duration-300 focus:outline-none focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.1)] hover:border-[#444]"
                   required placeholder="Enter product title">
        </div>

        <div class="mb-6">
            <label for="image" class="block text-sm font-semibold text-[#cccccc] mb-2 uppercase tracking-wide">Product Image</label>
            <input type="file" id="image" name="image" accept="image/*"
                   class="w-full bg-[#0a0a0a] border border-[#333] text-[#888] p-2.5 rounded-md text-sm transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#333] file:text-white hover:file:bg-[#444] cursor-pointer focus:outline-none focus:border-[#ffd700]">
            <div class="text-xs text-[#666] mt-2">Recommended: Square image, max 5MB. Formats: JPG, PNG.</div>
        </div>

        <div class="mb-8">
            <label for="description" class="block text-sm font-semibold text-[#cccccc] mb-2 uppercase tracking-wide">Product Description *</label>
            <textarea id="description" name="description" rows="5" 
                      class="w-full bg-[#0a0a0a] border border-[#333] text-white p-3.5 rounded-md text-base transition-all duration-300 focus:outline-none focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.1)] hover:border-[#444] resize-y font-body"
                      required placeholder="Enter detailed product description">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md font-bold text-base cursor-pointer transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(255,215,0,0.2)]">Add Product</button>
            <a href="{{ route('admin.featured-products.index') }}" class="px-8 py-3.5 bg-transparent border border-[#333] text-[#cccccc] rounded-md text-base text-center no-underline transition-all duration-300 hover:bg-[#222] hover:text-white">Cancel</a>
        </div>
    </form>
</div>
@endsection
