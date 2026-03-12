@extends('admin.blog.layout')

@section('title', 'Create Blog Post')
@section('pageTitle', 'Create Blog Post')
@section('crumb', 'Create')

@section('content')
<div class="max-w-[980px]">
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-8">
        <form method="POST" action="{{ route('admin.blog.posts.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.blog.posts._form', ['buttonText' => 'Create Post'])
        </form>
    </div>
</div>
@endsection
