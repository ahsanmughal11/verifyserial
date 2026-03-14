@extends('layouts.admin')

@section('title', 'Edit Blog Post')
@section('page-title', 'Edit Blog Post')

@section('breadcrumb')
<span>/</span>
<a href="{{ route('admin.blog.posts.index') }}" class="text-[#ffd700] no-underline hover:underline">Blog</a>
<span>/</span>
<span class="text-[#888]">Edit</span>
@endsection

@section('header-actions')
<a href="{{ route('admin.blog.posts.index') }}" class="text-[#ffd700] no-underline hover:underline flex items-center gap-2 text-sm font-semibold transition-colors duration-300 hover:text-[#d4af37]">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
    Back to Posts
</a>
@endsection

@section('content')
<div class="max-w-[980px]">
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-8">
        <form method="POST" action="{{ route('admin.blog.posts.update', $post) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.blog.posts._form', ['buttonText' => 'Update Post'])
        </form>
    </div>
</div>
@endsection
