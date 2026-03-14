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
<div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse md:min-w-[900px]">
            <thead>
                <tr>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Title</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Status</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Publish Date</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Categories</th>
                    <th class="py-4 px-6 text-left border-b border-[#2a2a2a] text-[#ffd700] text-xs uppercase tracking-wide">Actions</th>
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
                            <div class="flex gap-2">
                                <a href="{{ route('admin.blog.posts.edit', $post) }}" class="py-2 px-3 border border-[#ffd700] text-[#ffd700] rounded text-xs no-underline hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-200">Edit</a>
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="py-2 px-3 border border-[#2a2a2a] text-[#ccc] rounded text-xs no-underline hover:bg-[#333] transition-all duration-200">View</a>
                                <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2 px-3 border border-[#ff6b6b] text-[#ff6b6b] rounded text-xs bg-transparent cursor-pointer hover:bg-[#ff6b6b] hover:text-white transition-all duration-200">Delete</button>
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
