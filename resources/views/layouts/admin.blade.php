<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Karachi Bullion Exchange</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('head')
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
                {{-- Dashboard --}}
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ Request::routeIs('dashboard') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>

                {{-- Products --}}
                <li class="mb-2">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ Request::routeIs('admin.products.*') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2z"/>
                        </svg>
                        Products
                    </a>
                </li>

                {{-- Featured Products --}}
                <li class="mb-2">
                    <a href="{{ route('admin.featured-products.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ Request::routeIs('admin.featured-products.*') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        Featured Products
                    </a>
                </li>

                {{-- Blog Dropdown --}}
                @php $blogOpen = Request::routeIs('admin.blog.*'); @endphp
                <li class="mb-2">
                    <button onclick="this.closest('li').classList.toggle('sidebar-open')" class="w-full flex items-center gap-3 py-3.5 px-[18px] {{ $blogOpen ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} border-none bg-transparent rounded-md transition-all duration-300 text-sm font-medium cursor-pointer text-left">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 7h10v2H7zm0 4h10v2H7zm0 4h6v2H7z"/>
                        </svg>
                        <span class="flex-1">Blog</span>
                        <svg class="w-4 h-4 transition-transform duration-300 sidebar-chevron" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                    </button>
                    <ul class="list-none pl-8 mt-1 space-y-1 sidebar-submenu overflow-hidden transition-all duration-300 {{ $blogOpen ? '' : 'max-h-0' }}" style="{{ $blogOpen ? 'max-height:200px;' : '' }}">
                        <li>
                            <a href="{{ route('admin.blog.posts.index') }}" class="flex items-center gap-2.5 py-2.5 px-4 {{ Request::routeIs('admin.blog.posts.*') ? 'text-[#ffd700]' : 'text-[#999] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-[13px]">
                                <span class="w-1.5 h-1.5 rounded-full {{ Request::routeIs('admin.blog.posts.*') ? 'bg-[#ffd700]' : 'bg-[#555]' }}"></span>
                                Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blog.categories.index') }}" class="flex items-center gap-2.5 py-2.5 px-4 {{ Request::routeIs('admin.blog.categories.*') ? 'text-[#ffd700]' : 'text-[#999] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-[13px]">
                                <span class="w-1.5 h-1.5 rounded-full {{ Request::routeIs('admin.blog.categories.*') ? 'bg-[#ffd700]' : 'bg-[#555]' }}"></span>
                                Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blog.tags.index') }}" class="flex items-center gap-2.5 py-2.5 px-4 {{ Request::routeIs('admin.blog.tags.*') ? 'text-[#ffd700]' : 'text-[#999] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-[13px]">
                                <span class="w-1.5 h-1.5 rounded-full {{ Request::routeIs('admin.blog.tags.*') ? 'bg-[#ffd700]' : 'bg-[#555]' }}"></span>
                                Tags
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- View Site --}}
                <li class="mb-2">
                    <a href="/" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]" target="_blank">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                        </svg>
                        View Site
                    </a>
                </li>
            </ul>
        </nav>

        <div class="px-8 pt-5 border-t border-[#2a2a2a] mt-auto">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-full flex items-center justify-center font-bold text-[#1a1a1a] text-base">{{ auth()->check() ? substr(auth()->user()->name, 0, 1) : 'A' }}</div>
                <div class="flex-1 overflow-hidden">
                    <div class="text-sm font-semibold text-white mb-0.5 truncate">{{ auth()->check() ? auth()->user()->name : 'Admin' }}</div>
                    <div class="text-xs text-[#888] truncate">{{ auth()->check() ? auth()->user()->email : '' }}</div>
                </div>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="w-full py-3 bg-transparent text-[#ff6b6b] border border-[#ff6b6b] rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 hover:bg-[#ff6b6b] hover:text-white">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-[280px] bg-[#0f0f0f] min-h-screen">
        <header class="bg-gradient-to-b from-[#1a1a1a] to-[#151515] border-b border-[#2a2a2a] px-10 py-5 flex justify-between items-center sticky top-0 z-[100]">
            <div>
                <h1 class="text-[28px] font-bold text-white mb-1">@yield('page-title')</h1>
                <div class="flex items-center gap-2 text-[13px] text-[#888]">
                    <a href="{{ route('dashboard') }}" class="text-[#ffd700] no-underline hover:underline">Dashboard</a>
                    @yield('breadcrumb')
                </div>
            </div>
            @yield('header-actions')
        </header>

        <div class="p-10">
            @if(session('success'))
                <div class="bg-[rgba(81,207,102,0.1)] border border-[#51cf66] text-[#51cf66] px-5 py-4 rounded-md mb-6 flex items-center gap-3">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-[rgba(255,107,107,0.1)] border border-[#ff6b6b] text-[#ff6b6b] px-5 py-4 rounded-md mb-6 flex items-center gap-3">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.47 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-[rgba(255,107,107,0.1)] border border-[rgba(255,107,107,0.3)] rounded-lg py-4 px-5 mb-6 text-[#ff6b6b]">
                    <ul class="m-0 pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <style>
        .sidebar-open .sidebar-submenu { max-height: 200px !important; }
        .sidebar-open .sidebar-chevron { transform: rotate(180deg); }
    </style>

    @stack('scripts')
</body>
</html>
