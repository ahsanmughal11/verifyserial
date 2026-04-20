@extends('layouts.admin')

@section('title', 'Manage Products')
@section('page-title', 'Manage Products')

@section('breadcrumb')
    <span>/</span>
    <span>Products</span>
@endsection

@section('header-actions')
    <div class="flex gap-4 md:w-full md:mt-4">
        <a href="{{ route('admin.products.create') }}" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-semibold transition-all duration-300 no-underline hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
            </svg>
            Add Product
        </a>
    </div>
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

    @if($products->count() > 0)
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-0 overflow-hidden">
            <div class="py-6 px-8 border-b border-[#2a2a2a] flex justify-between items-center">
                <div class="text-lg font-semibold text-white">All Products ({{ $products->total() }})</div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse md:min-w-[800px]">
                    <thead>
                        <tr>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">ID</th>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Image</th>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">XRF Image</th>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Serial Number</th>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Product Name</th>
                            <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Manufacturing Date</th>
                            <th class="py-4.5 px-8 text-center border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="transition-all duration-200 hover:bg-[rgba(255,215,0,0.05)] [&:last-child_td]:border-b-0">
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">#{{ $product->id }}</td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                    @if($product->product_picture)
                                        <img src="{{ asset($product->product_picture) }}" alt="{{ $product->product_name }}" class="w-[60px] h-[60px] object-cover rounded-md border border-[#2a2a2a]">
                                    @else
                                        <div class="w-[60px] h-[60px] bg-[#151515] border border-[#2a2a2a] rounded-md flex items-center justify-center text-[#666] text-[11px] text-center">No Image</div>
                                    @endif
                                </td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                    @if($product->xrf_image)
                                        <img src="{{ asset($product->xrf_image) }}" alt="XRF - {{ $product->product_name }}" class="w-[60px] h-[60px] object-cover rounded-md border border-[#2a2a2a]">
                                    @else
                                        <div class="w-[60px] h-[60px] bg-[#151515] border border-[#2a2a2a] rounded-md flex items-center justify-center text-[#666] text-[11px] text-center">No XRF</div>
                                    @endif
                                </td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm"><strong class="text-[#ffd700]">{{ $product->serial_number }}</strong></td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">{{ $product->product_name }}</td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">{{ $product->manufacturing_date->format('M d, Y') }}</td>
                                <td class="py-4.5 px-8 text-center border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-transparent text-[#ffd700] no-underline transition-all duration-200 hover:bg-[#ffd700] hover:text-[#1a1a1a] hover:border-[#ffd700]">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            <span class="tooltip-text">Edit Product</span>
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="tooltip-wrap w-9 h-9 flex items-center justify-center rounded-lg border border-[#2a2a2a] bg-transparent text-[#ff6b6b] transition-all duration-200 hover:bg-[#ff6b6b] hover:text-white hover:border-[#ff6b6b] cursor-pointer">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                <span class="tooltip-text">Delete Product</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-6 px-8 border-t border-[#2a2a2a] flex justify-center gap-2 flex-wrap">
                {{ $products->links() }}
            </div>
        </div>
    @else
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-0 overflow-hidden">
            <div class="text-center py-20 px-5 text-[#888]">
                <svg class="w-20 h-20 mx-auto mb-5 opacity-30 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                </svg>
                <h3 class="text-xl text-white mb-2.5">No Products Found</h3>
                <p class="text-sm mb-6">Get started by adding your first product to the system.</p>
                <a href="{{ route('admin.products.create') }}" class="py-3.5 px-7 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-semibold transition-all duration-300 no-underline hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                    Add Your First Product
                </a>
            </div>
        </div>
    @endif
@endsection
