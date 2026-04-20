@extends('layouts.admin')

@section('title', 'Featured Products')
@section('page-title', 'Featured Products')

@section('breadcrumb')
<span>/</span>
<span class="text-[#888]">All Featured Products</span>
@endsection

@section('header-actions')
<a href="{{ route('admin.featured-products.create') }}" class="px-6 py-2.5 bg-gradient-to-r from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md font-bold text-sm cursor-pointer transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(255,215,0,0.2)] flex items-center gap-2">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
    </svg>
    Add Featured Product
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

<div class="bg-[#151515] border border-[#2a2a2a] rounded-lg overflow-hidden shadow-lg">
    <table class="w-full border-collapse text-left">
        <thead>
            <tr class="bg-[#1a1a1a] border-b border-[#2a2a2a]">
                <th class="p-5 text-sm font-semibold text-[#888] uppercase tracking-wider">Image</th>
                <th class="p-5 text-sm font-semibold text-[#888] uppercase tracking-wider">Product Info</th>
                <th class="p-5 text-sm font-semibold text-[#888] uppercase tracking-wider text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-[#2a2a2a]">
            @forelse($products as $product)
                <tr class="hover:bg-[#1a1a1a] transition-colors duration-200">
                    <td class="p-5">
                        <div class="w-16 h-16 rounded bg-[#0a0a0a] border border-[#333] overflow-hidden">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#333]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="p-5">
                        <div class="font-bold text-white text-base mb-1">{{ $product->title }}</div>
                        <div class="text-[#888] text-sm line-clamp-1 max-w-xl">{{ $product->description }}</div>
                    </td>
                    <td class="p-5 text-right">
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('admin.featured-products.edit', $product->id) }}" class="tooltip-wrap p-2 bg-[rgba(255,215,0,0.1)] text-[#ffd700] rounded hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-300 no-underline">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                                <span class="tooltip-text">Edit Product</span>
                            </a>
                            <form action="{{ route('admin.featured-products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tooltip-wrap p-2 bg-[rgba(255,107,107,0.1)] text-[#ff6b6b] rounded hover:bg-[#ff6b6b] hover:text-white transition-all duration-300 cursor-pointer">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.89 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                    </svg>
                                    <span class="tooltip-text">Delete Product</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-10 text-center text-[#888]">
                        <div class="flex flex-col items-center gap-4">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="text-[#333]">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                            No featured products found. <a href="{{ route('admin.featured-products.create') }}" class="text-[#ffd700] hover:underline">Add your first product</a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($products->hasPages())
        <div class="p-5 border-t border-[#2a2a2a] bg-[#1a1a1a]">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
