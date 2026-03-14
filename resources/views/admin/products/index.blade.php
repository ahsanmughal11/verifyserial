<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Karachi Bullion Exchange</title>
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
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] text-[#ffd700] no-underline rounded-md transition-all duration-300 text-sm font-medium bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]">
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
        <div class="bg-gradient-to-b from-[#1a1a1a] to-[#151515] border-b border-[#2a2a2a] px-10 py-5 flex justify-between items-center sticky top-0 z-[100] md:px-5 md:flex-wrap">
            <div>
                <h1 class="text-[28px] font-bold text-white mb-1">Manage Products</h1>
                <div class="flex items-center gap-2 text-[13px] text-[#888]">
                    <a href="{{ route('dashboard') }}" class="text-[#ffd700] no-underline hover:underline">Dashboard</a>
                    <span>/</span>
                    <span>Products</span>
                </div>
            </div>
            <div class="flex gap-4 md:w-full md:mt-4">
                <a href="{{ route('admin.products.create') }}" class="py-3 px-6 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-sm font-semibold transition-all duration-300 no-underline hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                    Add Product
                </a>
            </div>
        </div>

        <div class="p-10 md:p-5">
            @if(session('success'))
                <div class="py-4 px-5 mb-6 rounded-lg border border-[rgba(81,207,102,0.3)] flex items-center gap-3 bg-[rgba(81,207,102,0.1)] text-[#51cf66]">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

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
                                    <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Serial Number</th>
                                    <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Product Name</th>
                                    <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Manufacturing Date</th>
                                    <th class="py-4.5 px-8 text-left border-b border-[#2a2a2a] bg-transparent font-semibold text-[#ffd700] text-xs uppercase tracking-wide whitespace-nowrap">Actions</th>
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
                                        <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm"><strong class="text-[#ffd700]">{{ $product->serial_number }}</strong></td>
                                        <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">{{ $product->product_name }}</td>
                                        <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">{{ $product->manufacturing_date->format('M d, Y') }}</td>
                                        <td class="py-4.5 px-8 text-left border-b border-[#2a2a2a] text-[#cccccc] text-sm">
                                            <div class="flex gap-2.5">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="py-2 px-4 bg-transparent text-[#ffd700] border border-[#ffd700] rounded-md text-[13px] no-underline transition-all duration-300 hover:bg-[#ffd700] hover:text-[#1a1a1a]">Edit</a>
                                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="py-2 px-4 bg-transparent text-[#ff6b6b] border border-[#ff6b6b] rounded-md text-[13px] transition-all duration-300 hover:bg-[#ff6b6b] hover:text-white cursor-pointer">Delete</button>
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
        </div>
    </main>
</body>
</html>
