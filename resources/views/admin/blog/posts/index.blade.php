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

    @if($posts->count() > 0)
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden shadow-2xl">
            <div class="py-6 px-8 border-b border-[#2a2a2a] flex justify-between items-center bg-[rgba(26,26,26,0.5)]">
                <div class="text-lg font-bold text-white tracking-tight">Blog Posts <span class="text-[#888] ml-2 font-normal text-sm">({{ $posts->total() }})</span></div>
                
                {{-- Frontend Search --}}
                <div class="relative w-72">
                    <input type="text" id="tableSearch" placeholder="Search by title..." 
                           class="w-full py-2 pl-10 pr-4 bg-[#0f0f0f] border border-[#333] rounded-full text-sm text-white focus:border-[#ffd700] outline-none transition-all duration-300">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#666]">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse md:min-w-[900px]" id="blogTable">
                    <thead>
                        <tr class="bg-[rgba(0,0,0,0.2)]">
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Sr. No.</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Title</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Status</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Publish Date</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Categories</th>
                            <th class="py-5 px-8 text-center border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            @php
                                $srNo = (($posts->currentPage() - 1) * $posts->perPage()) + $loop->iteration;
                            @endphp
                            <tr class="transition-all duration-200 hover:bg-[rgba(255,215,0,0.03)] [&:last-child_td]:border-b-0" data-searchable="{{ strtolower($post->title) }}">
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#888] font-mono text-xs">{{ str_pad($srNo, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a] text-sm">
                                    <div class="font-bold text-white tracking-tight">{{ $post->title }}</div>
                                    <div class="text-[11px] text-[#666] font-mono">/{{ $post->slug }}</div>
                                </td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a] text-sm">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $post->status === 'published' ? 'bg-[rgba(81,207,102,0.1)] text-[#51cf66] border border-[rgba(81,207,102,0.2)]' : 'bg-[rgba(255,215,0,0.1)] text-[#ffd700] border border-[rgba(255,215,0,0.2)]' }}">
                                        {{ $post->status }}
                                    </span>
                                </td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a] text-xs text-[#888] font-medium">
                                    {{ $post->publish_date ? $post->publish_date->format('d M, Y') : '-' }}
                                </td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a] text-xs text-[#ccc]">
                                    {{ $post->categories->pluck('name')->implode(', ') ?: '-' }}
                                </td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a]">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-md border border-[#2a2a2a] bg-[#1a1a1a] text-[#ffd700] hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-300">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            <span class="tooltip-text">Edit</span>
                                        </a>
                                        <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-md border border-[#2a2a2a] bg-[#1a1a1a] text-[#ccc] hover:bg-[#333] hover:text-white transition-all duration-300">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                            <span class="tooltip-text">View</span>
                                        </a>
                                        <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" class="inline" onsubmit="return confirm('Delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-md border border-[#2a2a2a] bg-[#1a1a1a] text-[#ff6b6b] hover:bg-[#ff6b6b] hover:text-white transition-all duration-300 cursor-pointer">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                <span class="tooltip-text">Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-6 px-8 border-t border-[#2a2a2a] flex justify-center bg-[rgba(26,26,26,0.3)]">
                {{ $posts->links() }}
            </div>
        </div>

        @push('scripts')
        <script>
            document.getElementById('tableSearch').addEventListener('keyup', function() {
                const q = this.value.toLowerCase();
                const rows = document.querySelectorAll('#blogTable tbody tr');
                rows.forEach(row => {
                    const text = row.getAttribute('data-searchable');
                    if (text) {
                        row.style.display = text.includes(q) ? '' : 'none';
                    }
                });
            });
        </script>
        @endpush
    @else
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-20 text-center shadow-xl">
            <svg class="w-16 h-16 mx-auto mb-6 opacity-20 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
            <h3 class="text-xl text-white font-bold mb-2">No Blog Posts Yet</h3>
            <p class="text-[#666] mb-8 max-w-xs mx-auto text-sm text-center">Start sharing your news and updates with your customers.</p>
            <a href="{{ route('admin.blog.posts.create') }}" class="py-3 px-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-bold no-underline transition-all duration-300 hover:shadow-[0_8px_20px_rgba(255,215,0,0.3)]">
                Create First Post
            </a>
        </div>
    @endif

@endsection
