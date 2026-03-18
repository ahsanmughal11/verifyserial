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
    @include('partials.header')

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
            <div class="bg-theme-gradient border border-theme-light rounded-xl p-10 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                <h2 class="text-2xl font-bold mb-6 text-theme-gold">Send us a Message</h2>
                
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
                        <label for="name" class="block mb-2.5 text-theme-secondary text-sm font-semibold">Full Name *</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            placeholder="Enter your full name"
                            class="w-full py-3.5 px-[18px] bg-theme-card border border-theme-light rounded-md text-theme-primary text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="email" class="block mb-2.5 text-theme-secondary text-sm font-semibold">Email Address *</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            placeholder="your.email@example.com"
                            class="w-full py-3.5 px-[18px] bg-theme-card border border-theme-light rounded-md text-theme-primary text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block mb-2.5 text-theme-secondary text-sm font-semibold">Subject *</label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject" 
                            value="{{ old('subject') }}" 
                            required 
                            placeholder="What is this regarding?"
                            class="w-full py-3.5 px-[18px] bg-theme-card border border-theme-light rounded-md text-theme-primary text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]"
                        >
                    </div>

                    <div>
                        <label for="message" class="block mb-2.5 text-theme-secondary text-sm font-semibold">Message *</label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6" 
                            required 
                            placeholder="Tell us how we can help you..."
                            class="w-full py-3.5 px-[18px] bg-theme-card border border-theme-light rounded-md text-theme-primary text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] resize-none"
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
                <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-theme-gold">Office Address</h3>
                            <p class="text-theme-secondary text-[15px] leading-relaxed">
                                Shop G-016, Gold Trade Centre, main Zaib-un-Nisa Street<br>
                                Karachi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-theme-gold">Phone</h3>
                            <p class="text-theme-secondary text-[15px] leading-relaxed">
                                <a href="tel:+923363975494" class="text-theme-secondary no-underline hover:text-theme-gold transition-colors duration-300">Saad Zikerwari: +92 336 3975494</a><br>
                                <a href="tel:+923322365541" class="text-theme-secondary no-underline hover:text-theme-gold transition-colors duration-300">Muhammad Talha: +92 332 2365541</a><br>
                                <span class="text-sm text-theme-muted">Mon - Sat: 9:00 AM - 6:00 PM</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-theme-gold">Email</h3>
                            <p class="text-theme-secondary text-[15px] leading-relaxed">
                                <a href="mailto:contact@karachibullionexchange.com" class="text-theme-secondary no-underline hover:text-theme-gold transition-colors duration-300">contact@karachibullionexchange.com</a><br>
                                <span class="text-sm text-theme-muted">We respond within 24 hours</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-2 text-theme-gold">Business Hours</h3>
                            <div class="text-theme-secondary text-[15px] leading-relaxed space-y-1">
                                <div class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span class="text-theme-gold">9:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Saturday</span>
                                    <span class="text-theme-gold">10:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Sunday</span>
                                    <span class="text-theme-muted">Closed</span>
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
