<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Karachi Bullion Exchange</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#f5f5f5] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')
    
    <!-- Hero Section -->
    <section class="max-w-[1200px] mx-auto py-20 px-10 text-center relative overflow-visible before:content-[''] before:absolute before:-top-[200px] before:left-1/2 before:-translate-x-1/2 before:w-[800px] before:h-[800px] before:bg-[radial-gradient(circle,rgba(255,215,0,0.15)_0%,rgba(212,175,55,0.1)_30%,transparent_70%)] before:pointer-events-none before:z-0 [&>*]:relative [&>*]:z-10">
        <div class="inline-flex items-center gap-2.5 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] px-6 py-3 rounded-sm font-bold text-sm mb-8">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            ESTABLISHED 1995
        </div>
        <h1 class="text-5xl font-bold mb-5 leading-tight md:text-[32px]">
            About <span class="text-[#ffd700] light-mode:text-[#b8860b]">Karachi Bullion Exchange</span>
        </h1>
        <p class="text-lg text-[#cccccc] light-mode:text-[#444444] max-w-[700px] mx-auto mb-10">
            Three decades of excellence in precious metals trading, authentication, and verification. Trusted by investors, collectors, and institutions worldwide.
        </p>
    </section>

    <!-- Our Story Section -->
    <section class="max-w-[1200px] mx-auto px-10 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="order-2 lg:order-1">
                <div class="inline-block mb-6">
                    <span class="text-[#ffd700] light-mode:text-[#b8860b] text-sm font-semibold tracking-[2px] uppercase">Our Heritage</span>
                </div>
                <h2 class="text-4xl font-bold mb-6 text-white light-mode:text-[#1a1a1a] md:text-3xl">
                    A Legacy of <span class="text-[#ffd700] light-mode:text-[#b8860b]">Trust & Excellence</span>
                </h2>
                <div class="space-y-4 text-[#cccccc] light-mode:text-[#4a4a4a] text-[15px] leading-relaxed">
                    <p>
                        Founded in 1995, Karachi Bullion Exchange has been at the forefront of precious metals trading in Pakistan and the broader region. What started as a small family business has grown into one of the most trusted names in bullion verification and authentication.
                    </p>
                    <p>
                        Our journey began with a simple mission: to provide investors and collectors with genuine, certified precious metals backed by transparent verification systems. Over the years, we've built a reputation for uncompromising quality, ethical practices, and innovative security solutions.
                    </p>
                    <p>
                        Today, we serve thousands of clients across the globe, from individual collectors to major financial institutions, all trusting in our commitment to authenticity and excellence.
                    </p>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] light-mode:from-white light-mode:to-[#fcfcfc] border border-[rgba(255,215,0,0.3)] light-mode:border-[#e5e5e5] rounded-xl p-10 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] light-mode:shadow-[0_8px_25px_rgba(0,0,0,0.08)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)]">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-5xl font-bold text-[#ffd700] light-mode:text-[#b8860b] mb-2">30+</div>
                            <div class="text-sm text-[#cccccc] light-mode:text-[#4a4a4a]">Years of Excellence</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold text-[#ffd700] light-mode:text-[#b8860b] mb-2">50K+</div>
                            <div class="text-sm text-[#cccccc] light-mode:text-[#4a4a4a]">Verified Assets</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold text-[#ffd700] light-mode:text-[#b8860b] mb-2">100+</div>
                            <div class="text-sm text-[#cccccc] light-mode:text-[#4a4a4a]">Countries Served</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold text-[#ffd700] light-mode:text-[#b8860b] mb-2">99.9%</div>
                            <div class="text-sm text-[#cccccc] light-mode:text-[#4a4a4a]">Purity Guarantee</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values Section -->
    <section class="max-w-[1200px] mx-auto px-10 py-16">
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <span class="text-[#ffd700] light-mode:text-[#b8860b] text-sm font-semibold tracking-[2px] uppercase">Our Foundation</span>
            </div>
            <h2 class="text-4xl font-bold mb-4 text-white light-mode:text-[#1a1a1a] md:text-3xl">
                Mission, Vision & <span class="text-[#ffd700] light-mode:text-[#b8860b]">Values</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-theme-gold">Our Mission</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    To provide the highest quality precious metals with transparent authentication systems, ensuring every investor and collector can trust in the authenticity of their assets.
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-theme-gold">Our Vision</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    To become the global standard for precious metals authentication, setting new benchmarks in security, transparency, and customer trust in the industry.
                </p>
            </div>

            <!-- Values -->
            <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-theme-gold">Our Values</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    Integrity, transparency, and excellence guide everything we do. We believe in building lasting relationships through trust, quality, and unwavering commitment to our clients.
                </p>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="max-w-[1200px] mx-auto px-10 py-16">
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <span class="text-[#ffd700] text-sm font-semibold tracking-[2px] uppercase">Excellence</span>
            </div>
            <h2 class="text-4xl font-bold mb-4 text-white md:text-3xl">
                Why Choose <span class="text-[#ffd700]">Karachi Bullion Exchange</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-[#ffd700]">Certified Authenticity</h3>
                <p class="text-[#cccccc] text-sm leading-relaxed">
                    Every product is verified by master assayers and backed by our digital authentication system, ensuring 100% authenticity.
                </p>
            </div>

            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-[#ffd700]">Advanced Security</h3>
                <p class="text-[#cccccc] text-sm leading-relaxed">
                    State-of-the-art anti-counterfeit technology including micro-engraving and blockchain-backed verification systems.
                </p>
            </div>

            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-[#ffd700]">Global Recognition</h3>
                <p class="text-[#cccccc] text-sm leading-relaxed">
                    Trusted by investors, collectors, and institutions in over 100 countries worldwide, with a proven track record of excellence.
                </p>
            </div>

            <div class="bg-theme-gradient border border-theme-light p-8 rounded-xl shadow-[0_8px_20px_var(--shadow-color)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-theme-gold">Premium Quality</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    All products meet the highest international standards of 999.9 fineness, certified by independent assay laboratories.
                </p>
            </div>

            <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-theme-gold">Expert Support</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    Our team of certified experts is available 24/7 to assist with verification, authentication, and any inquiries you may have.
                </p>
            </div>

            <div class="bg-theme-gradient border border-theme-light rounded-xl p-8 relative overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] hover:-translate-y-2 transition-all duration-300 group">
                <div class="w-14 h-14 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center mb-6 transition-all duration-300 group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)]">
                    <svg class="w-7 h-7 text-theme-gold" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3 text-theme-gold">Timely Service</h3>
                <p class="text-theme-secondary text-sm leading-relaxed">
                    Fast verification process with instant digital certificates, ensuring you get the authentication you need without delay.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="max-w-[1200px] my-20 mx-auto px-10">
        <div class="bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] p-[50px] px-[60px] rounded-xl flex flex-col md:flex-row justify-between items-center relative overflow-hidden text-center md:text-left gap-6">
            <div class="absolute -bottom-5 right-5 text-[200px] text-[rgba(26,26,26,0.1)] font-bold">?</div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-4xl font-bold mb-4">Ready to Verify Your Assets?</h2>
                <p class="text-base max-w-[500px] mx-auto md:mx-0">
                    Join thousands of satisfied customers who trust Karachi Bullion Exchange for authentic, verified precious metals.
                </p>
            </div>
            <div class="flex gap-4 md:flex-row flex-col w-full md:w-auto">
                <a href="/" class="w-full md:w-auto py-4 px-8 bg-[#1a1a1a] text-[#ffd700] border-2 border-[#1a1a1a] rounded-md text-base font-bold cursor-pointer transition-all duration-300 hover:bg-[#2a2a2a] whitespace-nowrap text-center no-underline">Verify Now</a>
                <a href="{{ route('contact') }}" class="w-full md:w-auto py-4 px-8 bg-transparent text-[#1a1a1a] border-2 border-[#1a1a1a] rounded-md text-base font-bold cursor-pointer transition-all duration-300 hover:bg-[rgba(26,26,26,0.2)] whitespace-nowrap text-center no-underline">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
