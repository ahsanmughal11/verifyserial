@extends('admin.blog.layout')

@section('title', 'Manage Blog Posts')
@section('pageTitle', 'Manage Blog Posts')
@section('crumb', 'Posts')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.blog.posts.create') }}" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md inline-flex items-center gap-2 text-sm font-semibold no-underline">Create Post</a>
</div>

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
                                <a href="{{ route('admin.blog.posts.edit', $post) }}" class="py-2 px-3 border border-[#ffd700] text-[#ffd700] rounded text-xs no-underline">Edit</a>
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="py-2 px-3 border border-[#2a2a2a] text-[#ccc] rounded text-xs no-underline">View</a>
                                <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2 px-3 border border-[#ff6b6b] text-[#ff6b6b] rounded text-xs">Delete</button>
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
