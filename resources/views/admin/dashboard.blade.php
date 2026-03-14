@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
@endsection

@section('content')
<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-8 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] hover:-translate-y-1 hover:border-[rgba(255,215,0,0.5)] hover:shadow-[0_10px_30px_rgba(255,215,0,0.1)]">
        <div class="flex justify-between items-start mb-5">
            <div class="text-[13px] text-[#888] uppercase tracking-wide font-semibold">Total Products</div>
            <div class="w-[50px] h-[50px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                </svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-white mb-2">{{ \App\Models\Product::count() }}</div>
        <div class="text-[13px] text-[#51cf66] flex items-center gap-1.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
            </svg>
            All verified products
        </div>
    </div>

    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-8 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] hover:-translate-y-1 hover:border-[rgba(255,215,0,0.5)] hover:shadow-[0_10px_30px_rgba(255,215,0,0.1)]">
        <div class="flex justify-between items-start mb-5">
            <div class="text-[13px] text-[#888] uppercase tracking-wide font-semibold">System Status</div>
            <div class="w-[50px] h-[50px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                </svg>
            </div>
        </div>
        <div class="text-4xl font-bold text-white mb-2">Active</div>
        <div class="text-[13px] text-[#51cf66] flex items-center gap-1.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            All systems operational
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-9 mb-8">
    <h2 class="text-xl font-semibold text-white mb-6 flex items-center gap-2.5 before:content-[''] before:w-1 before:h-5 before:bg-gradient-to-b before:from-[#ffd700] before:to-[#d4af37] before:rounded-sm">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <a href="{{ route('admin.products.index') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ffd700] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(255,215,0,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center text-[#ffd700]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Manage Products</div>
            <div class="text-[13px] text-[#888] leading-relaxed">View, edit, and manage all products in the system</div>
        </a>

        <a href="{{ route('admin.products.create') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ffd700] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(255,215,0,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center text-[#ffd700]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Add New Product</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Create a new product with serial number and details</div>
        </a>

        <a href="{{ route('admin.blog.posts.index') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ffd700] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(255,215,0,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center text-[#ffd700]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7zm0 4h10v2H7zm0 4h6v2H7z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Manage Blog</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Create and publish blog posts with categories and tags</div>
        </a>

        <a href="/" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ffd700] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(255,215,0,0.15)]" target="_blank">
            <div class="w-[45px] h-[45px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center text-[#ffd700]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">View Verification Page</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Preview the public verification page</div>
        </a>
    </div>
</div>
@endsection
