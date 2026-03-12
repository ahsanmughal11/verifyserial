<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Karachi Bullion Exchange</title>
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
                    <li><a href="{{ route('about') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Contact</a></li>
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

    <!-- Content -->
    <div class="max-w-[900px] mx-auto px-10 py-16">
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4 text-[#ffd700]">Privacy Policy</h1>
            <p class="text-[#cccccc] light-mode:text-[#4a4a4a] text-sm">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="bg-gradient-to-br from-[#2a2a2a] light-mode:from-white light-mode:to-[#fafafa] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] light-mode:border-[rgba(192,192,192,0.5)] rounded-xl p-10 space-y-8">
            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">1. Introduction</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    Karachi Bullion Exchange ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our verification services.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    By using our website, you consent to the data practices described in this policy. If you do not agree with the practices described in this policy, please do not use our services.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">2. Information We Collect</h2>
                <h3 class="text-xl font-semibold mb-3 text-[#ffd700]">2.1 Information You Provide</h3>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>Serial numbers for product verification</li>
                    <li>Contact information when you reach out to us (name, email, phone number)</li>
                    <li>Messages and inquiries submitted through our contact forms</li>
                </ul>

                <h3 class="text-xl font-semibold mb-3 mt-6 text-[#ffd700]">2.2 Automatically Collected Information</h3>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>IP address and browser type</li>
                    <li>Device information and operating system</li>
                    <li>Pages visited and time spent on our website</li>
                    <li>Referral sources and search terms</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">3. How We Use Your Information</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">We use the information we collect to:</p>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>Provide product verification services</li>
                    <li>Respond to your inquiries and provide customer support</li>
                    <li>Improve our website functionality and user experience</li>
                    <li>Analyze website usage and trends</li>
                    <li>Ensure website security and prevent fraud</li>
                    <li>Comply with legal obligations</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">4. Data Storage and Security</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the Internet or electronic storage is 100% secure.
                </p>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    Your data is stored on secure servers and is retained only for as long as necessary to fulfill the purposes outlined in this policy or as required by law.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">5. Sharing Your Information</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">We do not sell, trade, or rent your personal information to third parties. We may share your information only in the following circumstances:</p>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>With your explicit consent</li>
                    <li>To comply with legal obligations or court orders</li>
                    <li>To protect our rights, property, or safety</li>
                    <li>With service providers who assist in operating our website (under strict confidentiality agreements)</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">6. Your Rights</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">You have the right to:</p>
                <ul class="list-disc pl-6 space-y-2 text-[#cccccc] light-mode:text-[#4a4a4a]">
                    <li>Access your personal information</li>
                    <li>Request correction of inaccurate data</li>
                    <li>Request deletion of your personal information</li>
                    <li>Object to processing of your personal information</li>
                    <li>Request data portability</li>
                    <li>Withdraw consent at any time</li>
                </ul>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mt-4">
                    To exercise these rights, please contact us at <a href="mailto:verification@karachibullion.com" class="text-[#ffd700] hover:underline">verification@karachibullion.com</a>.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">7. Cookies and Tracking Technologies</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    We use cookies and similar tracking technologies to enhance your browsing experience. For detailed information about our use of cookies, please refer to our <a href="{{ route('legal.cookies') }}" class="text-[#ffd700] hover:underline">Cookies Policy</a>.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">8. Third-Party Links</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    Our website may contain links to third-party websites. We are not responsible for the privacy practices of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">9. Children's Privacy</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    Our services are not directed to individuals under the age of 18. We do not knowingly collect personal information from children. If you believe we have collected information from a child, please contact us immediately.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">10. Changes to This Policy</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed">
                    We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. You are advised to review this policy periodically for any changes.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-4 text-[#ffd700]">11. Contact Us</h2>
                <p class="text-[#cccccc] light-mode:text-[#4a4a4a] leading-relaxed mb-4">
                    If you have any questions about this Privacy Policy, please contact us:
                </p>
                <div class="text-[#cccccc] light-mode:text-[#4a4a4a] space-y-2">
                    <p><strong>Email:</strong> <a href="mailto:verification@karachibullion.com" class="text-[#ffd700] hover:underline">verification@karachibullion.com</a></p>
                    <p><strong>Phone:</strong> +92 21 3456 7890</p>
                    <p><strong>Address:</strong> Main Bullion Market, Lyari, Karachi, Pakistan</p>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
