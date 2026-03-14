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
    @include('partials.admin-sidebar')

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
