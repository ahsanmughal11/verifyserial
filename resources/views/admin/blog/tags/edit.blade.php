@extends('admin.blog.layout')

@section('title', 'Edit Tag')
@section('pageTitle', 'Edit Tag')
@section('crumb', 'Edit Tag')

@section('content')
<div class="max-w-[700px] bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-6">
    <form method="POST" action="{{ route('admin.blog.tags.update', $tag) }}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-2 text-sm text-[#ccc]">Name</label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white">
        </div>
        <div>
            <label class="block mb-2 text-sm text-[#ccc]">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $tag->slug) }}" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white">
        </div>
        <div class="flex gap-3">
            <button type="submit" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md">Update Tag</button>
            <a href="{{ route('admin.blog.tags.index') }}" class="py-3 px-6 border border-[#2a2a2a] text-[#ccc] rounded-md no-underline">Back</a>
        </div>
    </form>
</div>
@endsection
