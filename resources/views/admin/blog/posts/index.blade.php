@extends('layouts.admin')

@section('title', 'Manage Blog Posts')
@section('page-title', 'Manage Blog Posts')

@section('breadcrumb')
<span>/</span>
<span class="text-[#888]">Blog</span>
<span>/</span>
<span class="text-[#888]">Posts</span>
@endsection

@section('header-actions')
<a href="{{ route('admin.blog.posts.create') }}" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md inline-flex items-center gap-2 text-sm font-semibold no-underline hover:-translate-y-0.5 transition-all duration-300 hover:shadow-[0_8px_20px_rgba(255,215,0,0.2)]">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
    Create Post
</a>
@endsection

@section('content')
<style>
    .tooltip-wrap { position: relative; }
    .tooltip-wrap .tooltip-text {
        visibility: hidden; opacity: 0;
        position: absolute; bottom: calc(100% + 8px); left: 50%; transform: translateX(-50%);
        background: #333; color: #fff; font-size: 11px; font-weight: 500;
        padding: 5px 10px; border-radius: 4px; white-space: nowrap; z-index: 50;
        transition: opacity 0.2s, visibility 0.2s;
        pointer-events: none;
    }
    .tooltip-wrap .tooltip-text::after {
        content: ''; position: absolute; top: 100%; left: 50%; transform: translateX(-50%);
        border: 5px solid transparent; border-top-color: #333;
    }
    .tooltip-wrap:hover .tooltip-text { visibility: visible; opacity: 1; }
</style>

<div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse md:min-w-[900px]">
            <thead>
                <tr>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Title</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Status</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Publish Date</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Categories</th>
                    <th class="py-4 px-6 text-center border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr class="hover:bg-[rgba(255,215,0,0.05)]">
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-sm">
                            <div class="font-semibold text-white">{{ $post->title }}</div>
                            <div class="text-xs text-[#888]">/{{ $post->slug }}</div>
                        </td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-sm">
                            <span class="px-2 py-1 rounded text-xs {{ $post->status === 'published' ? 'bg-[rgba(81,207,102,0.15)] text-[#51cf66]' : 'bg-[rgba(255,215,0,0.15)] text-[#ffd700]' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-sm text-[#ccc]">
                            {{ $post->publish_date ? $post->publish_date->format('M d, Y H:i') : '-' }}
                        </td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-sm text-[#ccc]">
                            {{ $post->categories->pluck('name')->implode(', ') ?: '-' }}
                        </td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-sm">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.blog.posts.edit', $post) }}" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-transparent text-[#ffd700] no-underline transition-all duration-200 hover:bg-[#ffd700] hover:text-[#1a1a1a] hover:border-[#ffd700]">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                    <span class="tooltip-text">Edit Post</span>
                                </a>
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-transparent text-[#ccc] no-underline transition-all duration-200 hover:bg-[#333] hover:text-white hover:border-[#444]">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                    <span class="tooltip-text">View Post</span>
                                </a>
                                <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-transparent text-[#ff6b6b] transition-all duration-200 hover:bg-[#ff6b6b] hover:text-white hover:border-[#ff6b6b] cursor-pointer">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                        <span class="tooltip-text">Delete Post</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10 px-6 text-center text-[#888]">No blog posts created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-[#2a2a2a]">
        {{ $posts->links() }}
    </div>
</div>
@endsection
