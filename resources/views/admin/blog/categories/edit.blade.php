@extends('layouts.admin')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('breadcrumb')
<span>/</span>
<a href="{{ route('admin.blog.categories.index') }}" class="text-[#ffd700] no-underline hover:underline">Blog</a>
<span>/</span>
<a href="{{ route('admin.blog.categories.index') }}" class="text-[#ffd700] no-underline hover:underline">Categories</a>
<span>/</span>
<span class="text-[#888]">Edit</span>
@endsection

@section('content')
<div class="max-w-[700px] bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-6">
    <form method="POST" action="{{ route('admin.blog.categories.update', $category) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-2 text-sm text-[#ccc] font-semibold">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
        </div>
        <div>
            <label class="block mb-2 text-sm text-[#ccc] font-semibold">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
        </div>
        <div>
            <label class="block mb-2 text-sm text-[#ccc] font-semibold">Description</label>
            <textarea name="description" rows="4" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">{{ old('description', $category->description) }}</textarea>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md font-semibold border-none cursor-pointer">Update Category</button>
            <a href="{{ route('admin.blog.categories.index') }}" class="py-3 px-6 border border-[#2a2a2a] text-[#ccc] rounded-md no-underline hover:bg-[#333] transition-colors">Back</a>
        </div>
    </form>
</div>
@endsection
