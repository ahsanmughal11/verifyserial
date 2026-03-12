<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Karachi Bullion Exchange</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#0f0f0f] text-white leading-relaxed flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-[280px] bg-gradient-to-b from-[#1a1a1a] to-[#151515] border-r border-[#2a2a2a] py-8 fixed h-screen overflow-y-auto z-[1000] flex flex-col">
        <div class="px-8 pb-8 border-b border-[#2a2a2a] mb-8">
            <div class="flex items-center gap-3">
                <div class="w-[45px] h-[45px] bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-2xl">🏛️</div>
                <div class="flex flex-col">
                    <div class="text-lg font-bold text-[#ffd700] tracking-wide">KARACHI BULLION</div>
                    <div class="text-[10px] text-[#888] tracking-[0.5px]">ADMIN PANEL</div>
                </div>
            </div>
        </div>

        <nav class="flex-1">
            <ul class="list-none px-5">
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] text-[#ffd700] no-underline rounded-md transition-all duration-300 text-sm font-medium bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                        </svg>
                        Products
                    </a>
                </li>
                <li class="mb-2">
                    <a href="/" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]" target="_blank">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                        View Site
                    </a>
                </li>
            </ul>
        </nav>

        <div class="px-8 pt-5 border-t border-[#2a2a2a] mt-auto">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-full flex items-center justify-center font-bold text-[#1a1a1a] text-base">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div class="flex-1">
                    <div class="text-sm font-semibold text-white mb-0.5">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-[#888]">{{ auth()->user()->email }}</div>
                </div>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="w-full py-3 bg-transparent text-[#ff6b6b] border border-[#ff6b6b] rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 hover:bg-[#ff6b6b] hover:text-white">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-[280px] bg-[#0f0f0f]">
        <div class="bg-gradient-to-b from-[#1a1a1a] to-[#151515] border-b border-[#2a2a2a] px-10 py-5 flex justify-between items-center sticky top-0 z-[100]">
            <div>
                <h1 class="text-[28px] font-bold text-white mb-1">Add New Product</h1>
                <div class="flex items-center gap-2 text-[13px] text-[#888]">
                    <a href="{{ route('dashboard') }}" class="text-[#ffd700] no-underline hover:underline">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('products.index') }}" class="text-[#ffd700] no-underline hover:underline">Products</a>
                    <span>/</span>
                    <span>Add New</span>
                </div>
            </div>
        </div>

        <div class="p-10 max-w-[800px]">
            <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-10 relative before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] md:p-8 md:px-6">
                @if($errors->any())
                    <div class="bg-[rgba(255,107,107,0.1)] border border-[rgba(255,107,107,0.3)] rounded-lg py-4 px-5 mb-6 text-[#ff6b6b]">
                        <ul class="m-0 pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="serial_number" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Serial Number *</label>
                        <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number') }}" required placeholder="e.g. KBR-999-XXXX" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        @error('serial_number')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="product_name" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Name *</label>
                        <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required placeholder="Enter product name" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        @error('product_name')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="product_picture" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Picture</label>
                        <input type="file" id="product_picture" name="product_picture" accept="image/*" class="w-full py-2.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] cursor-pointer file:py-2 file:px-4 file:bg-gradient-to-br file:from-[#d4af37] file:to-[#ffd700] file:text-[#1a1a1a] file:border-none file:rounded-md file:font-semibold file:cursor-pointer file:mr-2.5">
                        @error('product_picture')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="manufacturing_date" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Manufacturing Date *</label>
                        <input type="date" id="manufacturing_date" name="manufacturing_date" value="{{ old('manufacturing_date') }}" required class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        @error('manufacturing_date')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="weight" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Weight (in Tola)</label>
                        <input type="number" id="weight" name="weight" value="{{ old('weight') }}" step="0.01" min="0" placeholder="e.g. 1.00" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        @error('weight')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="purity" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Purity</label>
                        <input type="text" id="purity" name="purity" value="{{ old('purity') }}" placeholder="e.g. 99.9% Pure Silver" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        @error('purity')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex gap-4 mt-8 pt-6 border-t border-[#2a2a2a] md:flex-col">
                        <button type="submit" class="py-3.5 px-7 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer md:w-full md:justify-center">Add Product</button>
                        <a href="{{ route('products.index') }}" class="py-3.5 px-7 bg-transparent text-[#cccccc] border border-[#2a2a2a] rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 no-underline hover:bg-[#2a2a2a] hover:text-white md:w-full md:justify-center">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
