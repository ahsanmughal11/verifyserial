<!-- Header -->
<header class="bg-[#1a1a1a] light-mode:bg-[#f5f5f5] px-4 sm:px-6 lg:px-[60px] py-4 sm:py-5 border-b border-[#333] light-mode:border-[#c0c0c0] transition-colors duration-300 relative z-50">
    
    <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <a href="/" class="flex items-center gap-4 no-underline">
                <img src="{{ asset('kbe-logo.png') }}" alt="KBE Logo" class="w-16 h-16 sm:w-20 sm:h-20 object-contain">

                <div class="flex flex-col">
                    <div class="text-base sm:text-xl font-bold text-[#ffd700] tracking-wide">
                        KARACHI BULLION
                    </div>
                    <div class="text-[10px] sm:text-[11px] text-[#cccccc] light-mode:text-[#6a6a6a] tracking-[0.5px]">
                        EXCHANGE
                    </div>
                </div>
            </a>
        </div>

        <!-- Desktop Nav + Theme Toggle -->
        <div class="hidden md:flex items-center gap-4">
            <nav>
                <ul class="flex gap-[30px] list-none">

                    <li>
                        <a href="{{ route('products.index') }}"
                           class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative
                           {{ request()->routeIs('products.*') ? 'after:content-[\'\'] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]' : '' }}">
                           Products
                        </a>
                    </li>

                    <li>
                        <a href="/"
                           class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative
                           {{ request()->is('/') ? 'after:content-[\'\'] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]' : '' }}">
                           Verification
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('blog.index') }}"
                           class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative
                           {{ request()->routeIs('blog.*') ? 'after:content-[\'\'] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]' : '' }}">
                           Blog
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}"
                           class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative
                           {{ request()->routeIs('about') ? 'after:content-[\'\'] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]' : '' }}">
                           About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}"
                           class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative
                           {{ request()->routeIs('contact') ? 'after:content-[\'\'] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]' : '' }}">
                           Contact
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Theme Toggle Button (Desktop) -->
            <button 
                id="theme-toggle" 
                type="button"
                onclick="toggleTheme()"
                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#2a2a2a] light-mode:bg-[#e8e8e8] border border-[#333] light-mode:border-[#c0c0c0] text-[#ffd700] hover:bg-[#333] light-mode:hover:bg-[#d0d0d0] transition-all duration-300 ml-4 cursor-pointer"
                aria-label="Toggle theme"
            >
                <svg id="theme-icon" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="12" r="4"/>
                    <path d="M12 2v2"/>
                    <path d="M12 20v2"/>
                    <path d="M4.93 4.93l1.41 1.41"/>
                    <path d="M17.66 17.66l1.41 1.41"/>
                    <path d="M2 12h2"/>
                    <path d="M20 12h2"/>
                    <path d="M6.34 17.66l-1.41 1.41"/>
                    <path d="M19.07 4.93l-1.41 1.41"/>
                </svg>
            </button>
        </div>

        <!-- Mobile: Theme Toggle + Hamburger -->
        <div class="flex items-center gap-2 md:hidden">
            <!-- Theme Toggle Button (Mobile) -->
            <button 
                type="button"
                onclick="toggleTheme()"
                class="w-9 h-9 flex items-center justify-center rounded-md bg-[#2a2a2a] light-mode:bg-[#e8e8e8] border border-[#333] light-mode:border-[#c0c0c0] text-[#ffd700] hover:bg-[#333] light-mode:hover:bg-[#d0d0d0] transition-all duration-300 cursor-pointer"
                aria-label="Toggle theme"
            >
                <svg id="theme-icon-mobile" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <circle cx="12" cy="12" r="4"/>
                    <path d="M12 2v2"/>
                    <path d="M12 20v2"/>
                    <path d="M4.93 4.93l1.41 1.41"/>
                    <path d="M17.66 17.66l1.41 1.41"/>
                    <path d="M2 12h2"/>
                    <path d="M20 12h2"/>
                    <path d="M6.34 17.66l-1.41 1.41"/>
                    <path d="M19.07 4.93l-1.41 1.41"/>
                </svg>
            </button>

            <!-- Hamburger Button -->
            <button 
                id="mobile-menu-btn"
                type="button"
                onclick="toggleMobileMenu()"
                class="w-9 h-9 flex items-center justify-center rounded-md bg-[#2a2a2a] light-mode:bg-[#e8e8e8] border border-[#333] light-mode:border-[#c0c0c0] text-[#ffd700] hover:bg-[#333] light-mode:hover:bg-[#d0d0d0] transition-all duration-300 cursor-pointer"
                aria-label="Toggle mobile menu"
            >
                <!-- Hamburger Icon -->
                <svg id="hamburger-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <!-- Close Icon (hidden by default) -->
                <svg id="close-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <nav id="mobile-menu" class="hidden md:hidden mt-4 pb-2 border-t border-[#333] light-mode:border-[#c0c0c0] pt-4">
        <ul class="flex flex-col gap-1 list-none">
            <li>
                <a href="{{ route('products.index') }}"
                   class="block py-3 px-4 rounded-lg text-white light-mode:text-[#1a1a1a] no-underline text-sm font-medium transition-all duration-200 hover:bg-[#2a2a2a] light-mode:hover:bg-[#e8e8e8] hover:text-[#ffd700]
                   {{ request()->routeIs('products.*') ? 'bg-[#2a2a2a] light-mode:bg-[#e8e8e8] text-[#ffd700] border-l-2 border-[#ffd700]' : '' }}">
                   Products
                </a>
            </li>
            <li>
                <a href="/"
                   class="block py-3 px-4 rounded-lg text-white light-mode:text-[#1a1a1a] no-underline text-sm font-medium transition-all duration-200 hover:bg-[#2a2a2a] light-mode:hover:bg-[#e8e8e8] hover:text-[#ffd700]
                   {{ request()->is('/') ? 'bg-[#2a2a2a] light-mode:bg-[#e8e8e8] text-[#ffd700] border-l-2 border-[#ffd700]' : '' }}">
                   Verification
                </a>
            </li>
            <li>
                <a href="{{ route('blog.index') }}"
                   class="block py-3 px-4 rounded-lg text-white light-mode:text-[#1a1a1a] no-underline text-sm font-medium transition-all duration-200 hover:bg-[#2a2a2a] light-mode:hover:bg-[#e8e8e8] hover:text-[#ffd700]
                   {{ request()->routeIs('blog.*') ? 'bg-[#2a2a2a] light-mode:bg-[#e8e8e8] text-[#ffd700] border-l-2 border-[#ffd700]' : '' }}">
                   Blog
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                   class="block py-3 px-4 rounded-lg text-white light-mode:text-[#1a1a1a] no-underline text-sm font-medium transition-all duration-200 hover:bg-[#2a2a2a] light-mode:hover:bg-[#e8e8e8] hover:text-[#ffd700]
                   {{ request()->routeIs('about') ? 'bg-[#2a2a2a] light-mode:bg-[#e8e8e8] text-[#ffd700] border-l-2 border-[#ffd700]' : '' }}">
                   About Us
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                   class="block py-3 px-4 rounded-lg text-white light-mode:text-[#1a1a1a] no-underline text-sm font-medium transition-all duration-200 hover:bg-[#2a2a2a] light-mode:hover:bg-[#e8e8e8] hover:text-[#ffd700]
                   {{ request()->routeIs('contact') ? 'bg-[#2a2a2a] light-mode:bg-[#e8e8e8] text-[#ffd700] border-l-2 border-[#ffd700]' : '' }}">
                   Contact
                </a>
            </li>
        </ul>
    </nav>

</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const hamburger = document.getElementById('hamburger-icon');
        const close = document.getElementById('close-icon');
        
        menu.classList.toggle('hidden');
        hamburger.classList.toggle('hidden');
        close.classList.toggle('hidden');
    }

    // Close mobile menu when window resizes past md breakpoint
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            const menu = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('hamburger-icon');
            const close = document.getElementById('close-icon');
            
            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
                hamburger.classList.remove('hidden');
                close.classList.add('hidden');
            }
        }
    });
</script>