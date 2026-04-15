@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('breadcrumb')
@endsection

@section('content')
@php
    $totalProducts = \App\Models\Product::count();
    $totalFeatured = \App\Models\FeaturedProduct::count();
    $totalPosts = \App\Models\BlogPost::count();
    $publishedPosts = \App\Models\BlogPost::published()->count();
    $draftPosts = \App\Models\BlogPost::where('status', 'draft')->count();
    $totalCategories = \App\Models\BlogCategory::count();
    $totalTags = \App\Models\BlogTag::count();
    $recentProducts = \App\Models\Product::latest()->take(5)->get();
    $recentPosts = \App\Models\BlogPost::with('author')->latest()->take(5)->get();
@endphp

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
    {{-- Total Products --}}
    <a href="{{ route('admin.products.index') }}" class="no-underline bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-7 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] hover:-translate-y-1 hover:border-[rgba(255,215,0,0.5)] hover:shadow-[0_10px_30px_rgba(255,215,0,0.1)] group">
        <div class="flex justify-between items-start mb-4">
            <div class="text-[12px] text-[#888] uppercase tracking-wider font-semibold">Products</div>
            <div class="w-11 h-11 bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center group-hover:bg-[rgba(255,215,0,0.2)] transition-all duration-300">
                <svg class="w-5 h-5 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-white mb-1.5">{{ $totalProducts }}</div>
        <div class="text-[12px] text-[#888]">Verified products</div>
    </a>

    {{-- Featured Products --}}
    <a href="{{ route('admin.featured-products.index') }}" class="no-underline bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-7 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#f59f00] before:to-[#fab005] hover:-translate-y-1 hover:border-[rgba(245,159,0,0.5)] hover:shadow-[0_10px_30px_rgba(245,159,0,0.1)] group">
        <div class="flex justify-between items-start mb-4">
            <div class="text-[12px] text-[#888] uppercase tracking-wider font-semibold">Featured</div>
            <div class="w-11 h-11 bg-[rgba(245,159,0,0.1)] rounded-lg flex items-center justify-center group-hover:bg-[rgba(245,159,0,0.2)] transition-all duration-300">
                <svg class="w-5 h-5 text-[#f59f00]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-white mb-1.5">{{ $totalFeatured }}</div>
        <div class="text-[12px] text-[#888]">Showcase products</div>
    </a>

    {{-- Blog Posts --}}
    <a href="{{ route('admin.blog.posts.index') }}" class="no-underline bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-7 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#339af0] before:to-[#4dabf7] hover:-translate-y-1 hover:border-[rgba(51,154,240,0.5)] hover:shadow-[0_10px_30px_rgba(51,154,240,0.1)] group">
        <div class="flex justify-between items-start mb-4">
            <div class="text-[12px] text-[#888] uppercase tracking-wider font-semibold">Blog Posts</div>
            <div class="w-11 h-11 bg-[rgba(51,154,240,0.1)] rounded-lg flex items-center justify-center group-hover:bg-[rgba(51,154,240,0.2)] transition-all duration-300">
                <svg class="w-5 h-5 text-[#339af0]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7zm0 4h10v2H7zm0 4h6v2H7z"/>
                </svg>
            </div>
        </div>
        <div class="text-3xl font-bold text-white mb-1.5">{{ $totalPosts }}</div>
        <div class="text-[12px] text-[#888]">
            <span class="text-[#51cf66]">{{ $publishedPosts }} published</span>
            @if($draftPosts > 0)
                <span class="mx-1">·</span>
                <span class="text-[#ffd43b]">{{ $draftPosts }} draft</span>
            @endif
        </div>
    </a>

    {{-- Categories & Tags --}}
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-7 relative overflow-hidden transition-all duration-300 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ae3ec9] before:to-[#cc5de8] hover:-translate-y-1 hover:border-[rgba(174,62,201,0.5)] hover:shadow-[0_10px_30px_rgba(174,62,201,0.1)]">
        <div class="flex justify-between items-start mb-4">
            <div class="text-[12px] text-[#888] uppercase tracking-wider font-semibold">Taxonomy</div>
            <div class="w-11 h-11 bg-[rgba(174,62,201,0.1)] rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-[#ae3ec9]" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-baseline gap-3">
            <div>
                <div class="text-3xl font-bold text-white">{{ $totalCategories }}</div>
                <div class="text-[12px] text-[#888]">Categories</div>
            </div>
            <div class="text-2xl text-[#444] font-light">/</div>
            <div>
                <div class="text-3xl font-bold text-white">{{ $totalTags }}</div>
                <div class="text-[12px] text-[#888]">Tags</div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-9 mb-8">
    <h2 class="text-xl font-semibold text-white mb-6 flex items-center gap-2.5 before:content-[''] before:w-1 before:h-5 before:bg-gradient-to-b before:from-[#ffd700] before:to-[#d4af37] before:rounded-sm">Quick Actions</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <a href="{{ route('admin.products.create') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ffd700] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(255,215,0,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(255,215,0,0.1)] rounded-lg flex items-center justify-center text-[#ffd700]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Add New Product</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Create a new product with serial number and details</div>
        </a>

        <a href="{{ route('admin.featured-products.create') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#f59f00] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(245,159,0,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(245,159,0,0.1)] rounded-lg flex items-center justify-center text-[#f59f00]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Add Featured Product</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Showcase a product on the public products page</div>
        </a>

        <a href="{{ route('admin.blog.posts.create') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#339af0] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(51,154,240,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(51,154,240,0.1)] rounded-lg flex items-center justify-center text-[#339af0]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Write Blog Post</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Create and publish a new blog article</div>
        </a>

        <a href="{{ route('admin.blog.categories.index') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ae3ec9] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(174,62,201,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(174,62,201,0.1)] rounded-lg flex items-center justify-center text-[#ae3ec9]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Manage Categories</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Organize blog posts with categories</div>
        </a>

        <a href="{{ route('admin.blog.tags.index') }}" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#ae3ec9] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(174,62,201,0.15)]">
            <div class="w-[45px] h-[45px] bg-[rgba(174,62,201,0.1)] rounded-lg flex items-center justify-center text-[#ae3ec9]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">Manage Tags</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Label and tag blog content for discovery</div>
        </a>

        <a href="/" class="bg-[#151515] border border-[#2a2a2a] rounded-lg p-6 no-underline text-white transition-all duration-300 flex flex-col gap-4 hover:border-[#51cf66] hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(81,207,102,0.15)]" target="_blank">
            <div class="w-[45px] h-[45px] bg-[rgba(81,207,102,0.1)] rounded-lg flex items-center justify-center text-[#51cf66]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                </svg>
            </div>
            <div class="text-base font-semibold text-white">View Live Site</div>
            <div class="text-[13px] text-[#888] leading-relaxed">Preview the public-facing website</div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    {{-- Recent Products --}}
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
        <div class="py-5 px-7 border-b border-[#2a2a2a] flex justify-between items-center">
            <h2 class="text-base font-semibold text-white flex items-center gap-2.5 before:content-[''] before:w-1 before:h-4 before:bg-gradient-to-b before:from-[#ffd700] before:to-[#d4af37] before:rounded-sm">Recent Products</h2>
            <a href="{{ route('admin.products.index') }}" class="text-[12px] text-[#ffd700] no-underline hover:underline font-medium">View All →</a>
        </div>
        @if($recentProducts->count() > 0)
            <div class="divide-y divide-[#2a2a2a]">
                @foreach($recentProducts as $product)
                    <div class="flex items-center gap-4 py-4 px-7 transition-all duration-200 hover:bg-[rgba(255,215,0,0.03)]">
                        @if($product->product_picture)
                            <img src="{{ asset($product->product_picture) }}" alt="{{ $product->product_name }}" class="w-10 h-10 rounded-md object-cover border border-[#2a2a2a] flex-shrink-0">
                        @else
                            <div class="w-10 h-10 bg-[#151515] border border-[#2a2a2a] rounded-md flex items-center justify-center text-[#555] flex-shrink-0">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-white truncate">{{ $product->product_name }}</div>
                            <div class="text-[12px] text-[#ffd700] font-mono">{{ $product->serial_number }}</div>
                        </div>
                        <div class="text-[11px] text-[#666] whitespace-nowrap">{{ $product->created_at->diffForHumans() }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-12 text-center text-[#666] text-sm">No products yet</div>
        @endif
    </div>

    {{-- Recent Blog Posts --}}
    <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden">
        <div class="py-5 px-7 border-b border-[#2a2a2a] flex justify-between items-center">
            <h2 class="text-base font-semibold text-white flex items-center gap-2.5 before:content-[''] before:w-1 before:h-4 before:bg-gradient-to-b before:from-[#339af0] before:to-[#4dabf7] before:rounded-sm">Recent Blog Posts</h2>
            <a href="{{ route('admin.blog.posts.index') }}" class="text-[12px] text-[#339af0] no-underline hover:underline font-medium">View All →</a>
        </div>
        @if($recentPosts->count() > 0)
            <div class="divide-y divide-[#2a2a2a]">
                @foreach($recentPosts as $post)
                    <div class="flex items-center gap-4 py-4 px-7 transition-all duration-200 hover:bg-[rgba(51,154,240,0.03)]">
                        @if($post->featured_image)
                            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-10 h-10 rounded-md object-cover border border-[#2a2a2a] flex-shrink-0">
                        @else
                            <div class="w-10 h-10 bg-[#151515] border border-[#2a2a2a] rounded-md flex items-center justify-center text-[#555] flex-shrink-0">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7zm0 4h10v2H7zm0 4h6v2H7z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <div class="text-sm font-medium text-white truncate">{{ $post->title }}</div>
                            <div class="text-[12px] text-[#888]">{{ $post->author?->name ?? 'Unknown' }}</div>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            @if($post->status === 'published')
                                <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-full bg-[rgba(81,207,102,0.1)] text-[#51cf66] border border-[rgba(81,207,102,0.2)]">Published</span>
                            @else
                                <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-full bg-[rgba(255,212,59,0.1)] text-[#ffd43b] border border-[rgba(255,212,59,0.2)]">Draft</span>
                            @endif
                            <div class="text-[11px] text-[#666]">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="py-12 text-center text-[#666] text-sm">No blog posts yet</div>
        @endif
    </div>
</div>

<!-- System Info -->
<div class="mt-8 bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-7">
    <div class="flex items-center gap-3 mb-4">
        <div class="w-2.5 h-2.5 rounded-full bg-[#51cf66] animate-pulse"></div>
        <span class="text-sm font-semibold text-white">System Status</span>
        <span class="text-[12px] text-[#51cf66] ml-1">All systems operational</span>
    </div>
    <div class="flex flex-wrap gap-6 text-[12px] text-[#666]">
        <div>Laravel <span class="text-[#888]">v{{ app()->version() }}</span></div>
        <div>PHP <span class="text-[#888]">v{{ phpversion() }}</span></div>
        <div>Environment <span class="text-[#888]">{{ app()->environment() }}</span></div>
        <div class="text-[12px] text-[#666]">
            © {{ date('Y') }} Karachi Silver Enterprise
        </div>
    </div>
</div>
@endsection
