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
    <a href="{{ route('admin.blog.posts.index') }}" class="py-2.5 px-5 border border-[#2a2a2a] text-[#ccc] rounded-md inline-flex items-center gap-2 text-sm font-semibold no-underline hover:bg-[#2a2a2a] hover:text-white transition-all duration-300">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
        </svg>
        Back to List
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
