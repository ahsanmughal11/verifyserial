@extends('layouts.admin')

@section('title', 'Manage Products')
@section('page-title', 'Manage Products')

@section('breadcrumb')
    <span>/</span>
    <span>Products</span>
@endsection

@section('header-actions')
    <a href="{{ route('admin.products.create') }}" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-semibold transition-all duration-300 no-underline hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
        </svg>
        Add Product
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

    @if($products->count() > 0)
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-0 overflow-hidden shadow-2xl">
            <div class="py-6 px-8 border-b border-[#2a2a2a] flex justify-between items-center bg-[rgba(26,26,26,0.5)]">
                <div class="text-lg font-bold text-white tracking-tight">All Products <span class="text-[#888] ml-2 font-normal text-sm">({{ $products->total() }})</span></div>
                
                {{-- Frontend Search --}}
                <div class="relative w-72">
                    <input type="text" id="tableSearch" placeholder="Search name or serial..." 
                           class="w-full py-2 pl-10 pr-4 bg-[#0f0f0f] border border-[#333] rounded-full text-sm text-white focus:border-[#ffd700] outline-none transition-all duration-300">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#666]">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse md:min-w-[800px]" id="productsTable">
                    <thead>
                        <tr class="bg-[rgba(0,0,0,0.2)]">
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Sr. No.</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Image</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">XRF Image</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Serial Number</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Product Name</th>
                            <th class="py-5 px-8 text-left border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Date</th>
                            <th class="py-5 px-8 text-center border-b border-[#2a2a2a] font-bold text-[#ffd700] text-[11px] uppercase tracking-[0.1em] whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            @php
                                $srNo = (($products->currentPage() - 1) * $products->perPage()) + $loop->iteration;
                            @endphp
                            <tr class="transition-all duration-200 hover:bg-[rgba(255,215,0,0.03)] [&:last-child_td]:border-b-0" data-searchable="{{ strtolower($product->serial_number . ' ' . $product->product_name) }}">
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#888] font-mono text-xs">{{ str_pad($srNo, 2, '0', STR_PAD_LEFT) }}</td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                    @if($product->product_picture)
                                        <div class="w-[50px] h-[50px] rounded-lg overflow-hidden border border-[#2a2a2a] group cursor-pointer relative shadow-lg">
                                            <img src="{{ asset($product->product_picture) }}" alt="{{ $product->product_name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity"></div>
                                        </div>
                                    @else
                                        <div class="w-[50px] h-[50px] bg-[#0a0a0a] border border-[#222] rounded-lg flex items-center justify-center text-[#444] text-[10px]">&mdash;</div>
                                    @endif
                                </td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                    @if($product->xrf_image)
                                        <div class="w-[50px] h-[50px] rounded-lg overflow-hidden border border-[#2a2a2a] group cursor-pointer relative shadow-lg">
                                            <img src="{{ asset($product->xrf_image) }}" alt="XRF" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity"></div>
                                        </div>
                                    @else
                                        <div class="w-[50px] h-[50px] bg-[#0a0a0a] border border-[#222] rounded-lg flex items-center justify-center text-[#444] text-[10px]">&mdash;</div>
                                    @endif
                                </td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-white text-sm font-semibold tracking-wide">{{ $product->serial_number }}</td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#ccc] text-sm">{{ $product->product_name }}</td>
                                <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#888] text-xs font-medium">{{ $product->manufacturing_date->format('d M, y') }}</td>
                                <td class="py-4.5 px-8 border-b border-[#2a2a2a]">
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="tooltip-wrap w-8 h-8 flex items-center justify-center rounded-md border border-[#2a2a2a] bg-[#1a1a1a] text-[#ffd700] hover:bg-[#ffd700] hover:text-[#1a1a1a] transition-all duration-300">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                            <span class="tooltip-text">Edit</span>
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Delete this product?');">
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
                {{ $products->links() }}
            </div>
        </div>

        @push('scripts')
        <script>
            document.getElementById('tableSearch').addEventListener('keyup', function() {
                const q = this.value.toLowerCase();
                const rows = document.querySelectorAll('#productsTable tbody tr');
                rows.forEach(row => {
                    const text = row.getAttribute('data-searchable');
                    row.style.display = text.includes(q) ? '' : 'none';
                });
            });
        </script>
        @endpush
    @else
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-0 overflow-hidden">
            <div class="text-center py-20 px-5 text-[#888]">
                <svg class="w-16 h-16 mx-auto mb-6 opacity-30 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                </svg>
                <h3 class="text-xl text-white mb-3 font-bold">No Products Found</h3>
                <p class="text-sm mb-8 text-[#666]">Get started by adding your first silver product.</p>
                <a href="{{ route('admin.products.create') }}" class="py-3 px-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-bold transition-all duration-300 hover:shadow-[0_8px_20px_rgba(255,215,0,0.3)] no-underline">
                    Add Product
                </a>
            </div>
        </div>
    @endif
@endsection
