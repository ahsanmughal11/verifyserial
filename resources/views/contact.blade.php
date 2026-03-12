<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Karachi Bullion Exchange</title>
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#f5f5f5] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    <!-- Header -->
    <header class="bg-[#1a1a1a] light-mode:bg-[#f5f5f5] px-[60px] py-5 flex justify-between items-center border-b border-[#333] light-mode:border-[#c0c0c0] md:px-8 md:flex-wrap transition-colors duration-300">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-3 no-underline">
                <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-2xl">🏛️</div>
                <div class="flex flex-col">
                    <div class="text-xl font-bold text-[#ffd700] tracking-wide">KARACHI BULLION</div>
                    <div class="text-[11px] text-[#cccccc] light-mode:text-[#6a6a6a] tracking-[0.5px]">EXCHANGE</div>
                </div>
            </a>
        </div>
        <div class="flex items-center gap-4 md:order-3 md:w-full md:justify-center md:mt-4">
            <nav>
                <ul class="flex gap-[30px] list-none">
                    <li><a href="/" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Products</a></li>
                    <li><a href="/" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Verification</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Blog</a></li>
                    <li><a href="{{ route('about') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative after:content-[''] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]">Contact</a></li>
                </ul>
            </nav>
            <!-- Theme Toggle Button -->
            <button 
                id="theme-toggle" 
                type="button"
                onclick="if(typeof toggleTheme === 'function') { toggleTheme(); } else { console.error('toggleTheme function not found'); }"
                class="w-10 h-10 flex items-center justify-center rounded-md bg-[#2a2a2a] light-mode:bg-[#e8e8e8] border border-[#333] light-mode:border-[#c0c0c0] text-[#ffd700] hover:bg-[#333] light-mode:hover:bg-[#d0d0d0] transition-all duration-300 ml-4"
                aria-label="Toggle theme"
            >
                <svg id="theme-icon" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
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

    <!-- Hero Section -->
    <section class="max-w-[1200px] mx-auto py-16 px-10 text-center relative overflow-visible before:content-[''] before:absolute before:-top-[200px] before:left-1/2 before:-translate-x-1/2 before:w-[800px] before:h-[800px] before:bg-[radial-gradient(circle,rgba(255,215,0,0.15)_0%,rgba(212,175,55,0.1)_30%,transparent_70%)] before:pointer-events-none before:z-0 [&>*]:relative [&>*]:z-10">
        <div class="inline-flex items-center gap-2.5 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] px-6 py-3 rounded-sm font-bold text-sm mb-8">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            GET IN TOUCH
        </div>
        <h1 class="text-5xl font-bold mb-5 leading-tight md:text-[32px]">
            Contact <span class="text-[#ffd700]">Karachi Bullion Exchange</span>
        </h1>
        <p class="text-lg text-[#cccccc] max-w-[700px] mx-auto mb-10">
            Have questions about our products, verification process, or need assistance? We're here to help. Reach out to our expert team.
        </p>
    </section>

    <!-- Contact Section -->
    <section class="max-w-[1200px] mx-auto px-10 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Contact Form -->
            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-10 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                <h2 class="text-2xl font-bold mb-6 text-[#ffd700]">Send us a Message</h2>
                
                @if(session('success'))
                    <div class="mb-6 p-4 bg-[rgba(40,167,69,0.1)] border border-[rgba(40,167,69,0.3)] rounded-lg text-[#28a745]">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-[rgba(255,107,107,0.1)] border border-[rgba(255,107,107,0.3)] rounded-lg text-[#ff6b6b]">
                        <ul class="m-0 pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Full Name *</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            placeholder="Enter your full name"
                            class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="email" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Email Address *</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            placeholder="your.email@example.com"
                            class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Subject *</label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject" 
                            value="{{ old('subject') }}" 
                            required 
                            placeholder="What is this regarding?"
                            class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="message" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Message *</label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6" 
                            required 
                            placeholder="Tell us how we can help you..."
                            class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] resize-none"
                        >{{ old('message') }}</textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-4 px-8 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md text-base font-bold cursor-pointer flex items-center justify-center gap-2.5 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)]"
                    >
                        Send Message
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                <!-- Office Address -->
                <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-[#ffd700]">Office Address</h3>
                            <p class="text-[#cccccc] text-[15px] leading-relaxed">
                                Main Bullion Market, Lyari<br>
                                Karachi, Pakistan
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-[#ffd700]">Phone</h3>
                            <p class="text-[#cccccc] text-[15px] leading-relaxed">
                                <a href="tel:+922134567890" class="text-[#cccccc] no-underline hover:text-[#ffd700] transition-colors duration-300">+92 21 3456 7890</a><br>
                                <span class="text-sm text-[#888]">Mon - Sat: 9:00 AM - 6:00 PM</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-[#ffd700]">Email</h3>
                            <p class="text-[#cccccc] text-[15px] leading-relaxed">
                                <a href="mailto:verification@karachibullion.com" class="text-[#cccccc] no-underline hover:text-[#ffd700] transition-colors duration-300">verification@karachibullion.com</a><br>
                                <span class="text-sm text-[#888]">We respond within 24 hours</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-[#ffd700]">Business Hours</h3>
                            <div class="text-[#cccccc] text-[15px] leading-relaxed space-y-1">
                                <div class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span class="text-[#ffd700]">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Saturday</span>
                                    <span class="text-[#ffd700]">10:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Sunday</span>
                                    <span class="text-[#888]">Closed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
