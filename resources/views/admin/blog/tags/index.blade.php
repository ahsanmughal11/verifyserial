@extends('layouts.admin')

@section('title', 'Manage Tags')
@section('page-title', 'Manage Tags')

@section('breadcrumb')
<span>/</span>
<span class="text-[#888]">Blog</span>
<span>/</span>
<span class="text-[#888]">Tags</span>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1 bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4 text-white">Create Tag</h2>
        <form method="POST" action="{{ route('admin.blog.tags.store') }}" class="space-y-4">
            @csrf
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
            <input type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug (optional)" class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white focus:outline-none focus:border-[#ffd700] transition-colors">
            <button type="submit" class="w-full py-3 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md font-semibold border-none cursor-pointer hover:opacity-90 transition-opacity">Create Tag</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b border-[#2a2a2a] text-left text-xs uppercase text-[#ffd700]">Name</th>
                    <th class="py-3 px-4 border-b border-[#2a2a2a] text-left text-xs uppercase text-[#ffd700]">Slug</th>
                    <th class="py-3 px-4 border-b border-[#2a2a2a] text-left text-xs uppercase text-[#ffd700]">Posts</th>
                    <th class="py-3 px-4 border-b border-[#2a2a2a] text-left text-xs uppercase text-[#ffd700]">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr class="hover:bg-[rgba(255,215,0,0.05)]">
                        <td class="py-3 px-4 border-b border-[#2a2a2a]">{{ $tag->name }}</td>
                        <td class="py-3 px-4 border-b border-[#2a2a2a] text-[#888]">{{ $tag->slug }}</td>
                        <td class="py-3 px-4 border-b border-[#2a2a2a]">{{ $tag->posts_count }}</td>
                        <td class="py-3 px-4 border-b border-[#2a2a2a]">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.blog.tags.edit', $tag) }}" class="py-1.5 px-3 border border-[#ffd700] text-[#ffd700] rounded text-xs no-underline hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-200">Edit</a>
                                <form method="POST" action="{{ route('admin.blog.tags.destroy', $tag) }}" onsubmit="return confirm('Delete this tag?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-1.5 px-3 border border-[#ff6b6b] text-[#ff6b6b] rounded text-xs bg-transparent cursor-pointer hover:bg-[#ff6b6b] hover:text-white transition-all duration-200">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-8 px-4 text-center text-[#888]">No tags found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-[#2a2a2a]">{{ $tags->links() }}</div>
    </div>
</div>
@endsection
