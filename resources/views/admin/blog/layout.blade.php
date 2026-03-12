<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Admin') - Karachi Bullion Exchange</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="font-sans bg-[#0f0f0f] text-white leading-relaxed flex min-h-screen">
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
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]">Dashboard</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('products.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]">Products</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.blog.posts.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ request()->routeIs('admin.blog.posts.*') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">Posts</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.blog.categories.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ request()->routeIs('admin.blog.categories.*') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">Categories</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.blog.tags.index') }}" class="flex items-center gap-3 py-3.5 px-[18px] {{ request()->routeIs('admin.blog.tags.*') ? 'text-[#ffd700] bg-gradient-to-r from-[rgba(255,215,0,0.2)] to-transparent border-l-[3px] border-[#ffd700]' : 'text-[#cccccc] hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]' }} no-underline rounded-md transition-all duration-300 text-sm font-medium">Tags</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('blog.index') }}" target="_blank" class="flex items-center gap-3 py-3.5 px-[18px] text-[#cccccc] no-underline rounded-md transition-all duration-300 text-sm font-medium hover:bg-[rgba(255,215,0,0.1)] hover:text-[#ffd700]">View Blog</a>
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

    <main class="flex-1 ml-[280px] bg-[#0f0f0f] min-h-screen">
        <div class="bg-gradient-to-b from-[#1a1a1a] to-[#151515] border-b border-[#2a2a2a] px-10 py-5 sticky top-0 z-[100]">
            <h1 class="text-[28px] font-bold text-white mb-1">@yield('pageTitle')</h1>
            <div class="flex items-center gap-2 text-[13px] text-[#888]">
                <a href="{{ route('dashboard') }}" class="text-[#ffd700] no-underline hover:underline">Dashboard</a>
                <span>/</span>
                <span>Blog</span>
                @hasSection('crumb')
                    <span>/</span>
                    <span>@yield('crumb')</span>
                @endif
            </div>
        </div>

        <div class="p-10 md:p-5">
            @if(session('success'))
                <div class="py-4 px-5 mb-6 rounded-lg border border-[rgba(81,207,102,0.3)] flex items-center gap-3 bg-[rgba(81,207,102,0.1)] text-[#51cf66]">
                    {{ session('success') }}
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

    @stack('scripts')
</body>
</html>
