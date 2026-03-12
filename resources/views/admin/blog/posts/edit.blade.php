@extends('admin.blog.layout')

@section('title', 'Edit Blog Post')
@section('pageTitle', 'Edit Blog Post')
@section('crumb', 'Edit')

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
