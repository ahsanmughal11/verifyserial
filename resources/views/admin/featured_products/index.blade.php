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

<div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden shadow-2xl">
    <div class="py-6 px-8 border-b border-[#2a2a2a] flex justify-between items-center bg-[rgba(26,26,26,0.5)]">
        <div class="text-lg font-bold text-white tracking-tight">Featured Products <span class="text-[#888] ml-2 font-normal text-sm">({{ $products->count() }})</span></div>
        
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
        <table class="w-full border-collapse text-left" id="featuredTable">
            <thead>
                <tr class="bg-[rgba(0,0,0,0.2)]">
                    <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Sr. No.</th>
                    <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Image</th>
                    <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Product Info</th>
                    <th class="py-5 px-8 text-center border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a2a]">
                @forelse($products as $product)
                    <tr class="hover:bg-[rgba(255,215,0,0.03)] transition-colors duration-200" data-searchable="{{ strtolower($product->title) }}">
                        <td class="py-5 px-8 text-left text-[#888] font-mono text-xs">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-5 px-8">
                            <div class="w-16 h-16 rounded-lg bg-[#0a0a0a] border border-[#333] overflow-hidden shadow-lg group">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#333]">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="py-5 px-8">
                            <div class="font-bold text-white text-base mb-1 tracking-tight">{{ $product->title }}</div>
                            <div class="text-[#888] text-sm line-clamp-1 max-w-xl">{{ $product->description }}</div>
                        </td>
                        <td class="py-5 px-8">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('admin.featured-products.edit', $product) }}" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] text-[#ffd700] hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-300">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                    </svg>
                                    <span class="tooltip-text">Edit Product</span>
                                </a>
                                <form action="{{ route('admin.featured-products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-[#1a1a1a] text-[#ff6b6b] hover:bg-[#ff6b6b] hover:text-white transition-all duration-300 cursor-pointer">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
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
                        <td colspan="4" class="p-20 text-center text-[#888]">
                            <div class="flex flex-col items-center gap-6">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor" class="text-[#333] opacity-50">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                                <div class="max-w-xs mx-auto">
                                    <h3 class="text-xl text-white mb-2 font-bold">No Featured Products</h3>
                                    <p class="text-sm mb-6 text-[#666]">Showcase your best items on the home page.</p>
                                    <a href="{{ route('admin.featured-products.create') }}" class="py-3 px-8 bg-gradient-to-r from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md font-bold text-sm transition-all duration-300 hover:shadow-[0_8px_20px_rgba(255,215,0,0.3)] no-underline">Add Your First Product</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->hasPages())
            <div class="p-5 border-t border-[#2a2a2a] bg-[#1a1a1a]">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('tableSearch').addEventListener('keyup', function() {
        const q = this.value.toLowerCase();
        const rows = document.querySelectorAll('#featuredTable tbody tr');
        rows.forEach(row => {
            const text = row.getAttribute('data-searchable');
            if (text) {
                row.style.display = text.includes(q) ? '' : 'none';
            }
        });
    });
</script>
@endpush
@endsection
