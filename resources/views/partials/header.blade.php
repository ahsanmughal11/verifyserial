<!-- Header -->
<header class="bg-[#1a1a1a] light-mode:bg-white px-[60px] py-5 flex justify-between items-center border-b border-[#333] light-mode:border-[#e5e5e5] md:px-8 md:flex-wrap transition-colors duration-300 light-mode:shadow-sm">
    <div class="flex items-center gap-3">
        <a href="/" class="flex items-center gap-3 no-underline">
            <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] light-mode:from-[#b8860b] light-mode:to-[#daa520] rounded-sm flex items-center justify-center text-2xl shadow-sm">🏛️</div>
            <div class="flex flex-col">
                <div class="text-xl font-bold text-[#ffd700] light-mode:text-[#b8860b] tracking-wide">KARACHI BULLION</div>
                <div class="text-[11px] text-[#cccccc] light-mode:text-[#5a5a5a] tracking-[0.5px]">EXCHANGE</div>
            </div>
        </a>
    </div>
    <div class="flex items-center gap-4">
        <nav class="md:order-3 md:w-full md:flex md:justify-center md:mt-4">
            <ul class="flex gap-[30px] list-none">
                <li><a href="#" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] light-mode:hover:text-[#b8860b] relative font-medium">Products</a></li>
                <li><a href="/" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] light-mode:hover:text-[#b8860b] relative after:content-[''] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700] light-mode:after:bg-[#b8860b] font-medium">Verification</a></li>
                <li><a href="{{ route('blog.index') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] light-mode:hover:text-[#b8860b] relative font-medium">Blog</a></li>
                <li><a href="{{ route('about') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] light-mode:hover:text-[#b8860b] relative font-medium">About Us</a></li>
                <li><a href="{{ route('contact') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] light-mode:hover:text-[#b8860b] relative font-medium">Contact</a></li>
            </ul>
        </nav>
        <!-- Theme Toggle Button -->
        <button 
            id="theme-toggle" 
            type="button"
            onclick="if(typeof toggleTheme === 'function') { toggleTheme(); } else { console.error('toggleTheme function not found'); }"
            class="w-10 h-10 flex items-center justify-center rounded-md bg-[#2a2a2a] light-mode:bg-white light-mode:border-[#e5e5e5] border border-[#333] light-mode:border text-[#ffd700] light-mode:text-[#b8860b] hover:bg-[#333] light-mode:hover:bg-[#f5f5f5] transition-all duration-300 shadow-sm light-mode:shadow"
            aria-label="Toggle theme"
        >
            <svg id="theme-icon" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
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
</header>
