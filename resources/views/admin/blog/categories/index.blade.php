@extends('layouts.admin')

@section('title', 'Manage Categories')
@section('page-title', 'Manage Categories')

@section('breadcrumb')
<span>/</span>
<span class="text-[#888]">Blog</span>
<span>/</span>
<span class="text-[#888]">Categories</span>
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

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1 bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-white">Create Category</h2>
        <form method="POST" action="{{ route('admin.blog.categories.store') }}" class="space-y-4">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug (optional)" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
            <textarea name="description" rows="4" placeholder="Description" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">{{ old('description') }}</textarea>
            <button type="submit" class="w-full py-3 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md font-semibold border-none cursor-pointer hover:opacity-90 transition-opacity">Create Category</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-[rgba(0,0,0,0.2)]">
                    <th class="py-4 px-6 border-b border-[#2a2a2a] text-left text-[11px] font-bold uppercase text-[#ffd700] tracking-wider">Sr. No.</th>
                    <th class="py-4 px-6 border-b border-[#2a2a2a] text-left text-[11px] font-bold uppercase text-[#ffd700] tracking-wider">Name</th>
                    <th class="py-4 px-6 border-b border-[#2a2a2a] text-left text-[11px] font-bold uppercase text-[#ffd700] tracking-wider">Slug</th>
                    <th class="py-4 px-6 border-b border-[#2a2a2a] text-left text-[11px] font-bold uppercase text-[#ffd700] tracking-wider">Posts</th>
                    <th class="py-4 px-6 border-b border-[#2a2a2a] text-center text-[11px] font-bold uppercase text-[#ffd700] tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    @php
                        $srNo = (($categories->currentPage() - 1) * $categories->perPage()) + $loop->iteration;
                    @endphp
                    <tr class="hover:bg-[rgba(255,215,0,0.03)] transition-colors duration-200">
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-[#888] font-mono text-xs">{{ str_pad($srNo, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-white font-medium">{{ $category->name }}</td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-[#666] text-xs font-mono">{{ $category->slug }}</td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a] text-[#ccc] text-sm">{{ $category->posts_count }}</td>
                        <td class="py-4 px-6 border-b border-[#2a2a2a]">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.blog.categories.edit', $category) }}" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] text-[#ffd700] hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-300">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                    <span class="tooltip-text">Edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.blog.categories.destroy', $category) }}" onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] text-[#ff6b6b] hover:bg-[#ff6b6b] hover:text-white transition-all duration-300 cursor-pointer">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                        <span class="tooltip-text">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-12 px-4 text-center text-[#444] text-sm italic">No categories created yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-6 border-t border-[#2a2a2a] bg-[rgba(26,26,26,0.2)]">{{ $categories->links() }}</div>

    </div>
</div>
@endsection
