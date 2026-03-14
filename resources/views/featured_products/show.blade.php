<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $featuredProduct->title }} - Karachi Bullion Exchange</title>
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#f5f5f5] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')

    <div class="bg-[#0f0f0f] light-mode:bg-[#f9f9f9] min-h-screen py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 md:px-8">
            
            <div class="mb-8">
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 text-[#888] light-mode:text-[#666] hover:text-[#ffd700] light-mode:hover:text-[#b8860b] transition-colors duration-300 no-underline font-medium text-sm">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Back to Products
                </a>
            </div>

            <div class="bg-[#151515] light-mode:bg-white border border-[#2a2a2a] light-mode:border-[#e5e5e5] rounded-2xl overflow-hidden shadow-2xl">
                <div class="flex flex-col lg:flex-row">
                    
                    <!-- Product Image -->
                    <div class="lg:w-1/2 bg-[#0a0a0a] light-mode:bg-[#f0f0f0] p-8 md:p-12 flex items-center justify-center min-h-[400px] relative border-b lg:border-b-0 lg:border-r border-[#2a2a2a] light-mode:border-[#e5e5e5]">
                        @if($featuredProduct->image)
                            <img src="{{ asset($featuredProduct->image) }}" alt="{{ $featuredProduct->title }}" class="w-full max-w-lg h-auto object-contain rounded-lg drop-shadow-2xl z-10">
                        @else
                            <div class="text-[#444] light-mode:text-[#aaa] flex flex-col items-center">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="mb-4">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span class="text-sm font-medium uppercase tracking-widest">No Image Available</span>
                            </div>
                        @endif
                        
                        <!-- Decorative background elements -->
                        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-[#ffd700] to-transparent opacity-[0.03] rounded-bl-full pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gradient-to-tr from-[#d4af37] to-transparent opacity-[0.03] rounded-tr-full pointer-events-none"></div>
                    </div>
                    
                    <!-- Product Details -->
                    <div class="lg:w-1/2 p-8 md:p-12 flex flex-col">
                        <div class="mb-6">
                            <div class="inline-block px-3 py-1 bg-[rgba(255,215,0,0.1)] border border-[rgba(255,215,0,0.2)] text-[#ffd700] rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                                Featured Item
                            </div>
                            <h1 class="text-3xl md:text-4xl font-bold text-white light-mode:text-[#1a1a1a] leading-tight mb-2">{{ $featuredProduct->title }}</h1>
                            <div class="w-20 h-1 bg-gradient-to-r from-[#ffd700] to-[#d4af37] rounded-full mt-4"></div>
                        </div>
                        
                        <div class="prose prose-invert max-w-none text-base leading-relaxed text-[#cccccc] light-mode:text-[#4a4a4a] mb-10 flex-grow font-body">
                            {!! nl2br(e($featuredProduct->description)) !!}
                        </div>
                        
                        <div class="mt-auto pt-8 border-t border-[#2a2a2a] light-mode:border-[#e5e5e5] flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex items-center gap-3 text-sm text-[#888] light-mode:text-[#666]">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#ffd700]">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                Added: {{ $featuredProduct->created_at->format('M d, Y') }}
                            </div>
                            
                            <a href="{{ route('contact') }}" class="flex-shrink-0 px-8 py-3.5 bg-gradient-to-r from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md font-bold text-sm transition-all duration-300 hover:shadow-[0_8px_20px_rgba(255,215,0,0.25)] hover:-translate-y-0.5 no-underline flex items-center justify-center gap-2">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                Inquire Now
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
