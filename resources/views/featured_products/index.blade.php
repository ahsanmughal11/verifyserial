<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Products - Karachi Silver Enterprise</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')

    <div class="min-h-screen py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white light-mode:text-[#1a1a1a] mb-4 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:left-0 after:w-16 after:h-1 after:bg-gradient-to-r after:from-[#ffd700] after:to-[#d4af37]">Featured <span class="text-[#ffd700]">Products</span></h1>
                    <p class="text-[#888] light-mode:text-[#666] text-lg max-w-2xl mt-6">Explore our curated selection of verified, premium items.</p>
                </div>
                
                <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-auto min-w-[300px] relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." 
                           class="w-full bg-[#151515] light-mode:bg-white border border-[#333] light-mode:border-[#ddd] text-white light-mode:text-[#1a1a1a] py-3 px-12 pr-4 rounded-full focus:outline-none focus:border-[#ffd700] transition-colors duration-300 shadow-sm">
                    <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-[#888]">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
            </div>

            @if(request('search'))
                <div class="mb-8 text-[#888] light-mode:text-[#666]">
                    Showing results for "<span class="text-[#ffd700] font-semibold">{{ request('search') }}</span>"
                    <a href="{{ route('products.index') }}" class="ml-4 text-sm text-[#ff6b6b] hover:underline">Clear search</a>
                </div>
            @endif

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products as $product)
                        <a href="{{ route('products.show', $product->id) }}" class="group block no-underline bg-[#151515] light-mode:bg-white border border-[#2a2a2a] light-mode:border-[#e5e5e5] rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(255,215,0,0.1)] hover:border-[rgba(255,215,0,0.3)]">
                            <div class="aspect-square overflow-hidden relative">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#444] light-mode:text-[#aaa]">
                                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0f0f0f] via-transparent to-transparent opacity-60"></div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white light-mode:text-[#1a1a1a] mb-2 line-clamp-1 group-hover:text-[#ffd700] transition-colors">{{ $product->title }}</h3>
                                <p class="text-[#888] light-mode:text-[#666] text-sm line-clamp-2">{{ Str::limit(strip_tags($product->description), 100) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">
                    {{ $products->appends(['search' => request('search')])->links('pagination::tailwind') }}
                </div>
            @else
                <div class="text-center py-20 bg-[#151515] light-mode:bg-white border border-[#2a2a2a] light-mode:border-[#e5e5e5] rounded-xl">
                    <div class="w-20 h-20 mx-auto bg-[#0a0a0a] light-mode:bg-[#f0f0f0] rounded-full flex items-center justify-center text-[#ffd700] mb-6 shadow-inner">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white light-mode:text-[#1a1a1a] mb-3">No products found</h2>
                    <p class="text-[#888] light-mode:text-[#666] max-w-md mx-auto">We couldn't find any products matching your search criteria. Try a different term or browse all products.</p>
                    <a href="{{ route('products.index') }}" class="inline-block mt-8 px-8 py-3 bg-gradient-to-r from-[#1a1a1a] to-[#222] light-mode:from-white light-mode:to-[#f5f5f5] text-[#ffd700] light-mode:text-[#b8860b] border border-[#333] light-mode:border-[#ddd] rounded-md font-bold text-sm transition-all duration-300 hover:border-[#ffd700] hover:shadow-[0_0_15px_rgba(255,215,0,0.1)] hover:-translate-y-0.5 no-underline">
                        View All Products
                    </a>
                </div>
            @endif
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
