<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karachi Bullion Exchange - Asset Verification</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] text-white leading-relaxed">
    <!-- Header -->
    <header class="bg-[#1a1a1a] px-[60px] py-5 flex justify-between items-center border-b border-[#333] md:px-8 md:flex-wrap">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-2xl">🏛️</div>
            <div class="flex flex-col">
                <div class="text-xl font-bold text-[#ffd700] tracking-wide">KARACHI BULLION</div>
                <div class="text-[11px] text-[#cccccc] tracking-[0.5px]">EXCHANGE</div>
            </div>
        </div>
        <nav class="md:order-3 md:w-full md:flex md:justify-center md:mt-4">
            <ul class="flex gap-[30px] list-none">
                <li><a href="#" class="text-white no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Products</a></li>
                <li><a href="#" class="text-white no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative after:content-[''] after:absolute after:-bottom-[5px] after:left-0 after:right-0 after:h-0.5 after:bg-[#ffd700]">Verification</a></li>
                <li><a href="#" class="text-white no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">About Us</a></li>
                <li><a href="#" class="text-white no-underline text-sm transition-colors duration-300 hover:text-[#ffd700] relative">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="max-w-[1200px] mx-auto py-20 px-10 text-center relative overflow-visible before:content-[''] before:absolute before:-top-[200px] before:left-1/2 before:-translate-x-1/2 before:w-[800px] before:h-[800px] before:bg-[radial-gradient(circle,rgba(255,215,0,0.15)_0%,rgba(212,175,55,0.1)_30%,transparent_70%)] before:pointer-events-none before:z-0 [&>*]:relative [&>*]:z-10">
        <div class="inline-flex items-center gap-2.5 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] px-6 py-3 rounded-sm font-bold text-sm mb-8">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
            </svg>
            AUTHENTICITY GUARANTEE
    </div>
        <h1 class="text-5xl font-bold mb-5 leading-tight md:text-[32px]">
            Verify Your <span class="text-[#ffd700]">KBE Asset</span>
        </h1>
        <p class="text-lg text-[#cccccc] max-w-[700px] mx-auto mb-10">
            Enter the unique serial number engraved on your gold or silver bullion to confirm purity, weight, and refinery origin in our global secure database.
        </p>
        
        <form method="POST" action="/verify" class="flex flex-col md:flex-row items-stretch gap-3 md:gap-4 max-w-[800px] mx-auto mb-4">
        @csrf
            <div class="relative flex-1 w-full">
                <svg class="absolute left-5 top-1/2 -translate-y-1/2 w-6 h-6 text-[#ffd700] z-10" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3.5 3.5c-.28 0-.5.22-.5.5v16c0 .28.22.5.5.5h17c.28 0 .5-.22.5-.5V4c0-.28-.22-.5-.5-.5h-17zm1 1h15v14h-15V4.5zm2 2v2h11v-2H6.5zm0 3v2h11v-2h-11zm0 3v2h7v-2h-7z"/>
                </svg>
                <input 
                    type="text" 
                    name="serial_number" 
                    class="w-full py-[18px] px-5 pl-[60px] bg-[#2a2a2a] border-2 border-[#ffd700] rounded-sm text-white text-base outline-none transition-all duration-300 focus:border-[#d4af37] focus:shadow-[0_0_10px_rgba(255,215,0,0.3)] placeholder:text-[#888]" 
                    placeholder="Serial Number (e.g. KBR-999-XXXX)"
                    value="{{ $serial_number ?? '' }}"
                    required
                >
            </div>
            <button type="submit" class="w-full md:w-32 py-[18px] px-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-sm text-base font-bold cursor-pointer flex items-center justify-center gap-2.5 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] whitespace-nowrap">
                VERIFY
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                </svg>
            </button>
        </form>
        <p class="text-[13px] text-[#888] text-center mt-2.5">* Your serial number is located on the back or side of the assay card or bar.</p>

        @if(isset($verified) && !$verified)
            <div class="max-w-[800px] mx-auto my-10 p-8 bg-[#2a2a2a] border-2 border-[#dc3545] rounded-sm">
                <h2 class="text-2xl mb-5 text-[#dc3545]">✗ Product not found</h2>
                <div class="text-[#cccccc]">
                    <p>This serial number is not in our records. Please verify the serial number and try again.</p>
                </div>
            </div>
        @endif
    </section>

    <!-- Features Section -->
    <section class="max-w-[1200px] my-20 mx-auto px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-md p-[50px] px-9 text-center transition-all duration-300 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4),0_0_0_1px_rgba(255,215,0,0.1)_inset] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] before:opacity-60 before:transition-opacity before:duration-300 hover:-translate-y-2 hover:shadow-[0_12px_30px_rgba(255,215,0,0.3),0_0_0_1px_rgba(255,215,0,0.2)_inset] hover:border-[rgba(255,215,0,0.6)] hover:before:opacity-100 hover:before:h-1 group">
                <div class="w-[90px] h-[90px] mx-auto mb-6 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center transition-all duration-300 shadow-[0_4px_10px_rgba(255,215,0,0.2)] group-hover:bg-gradient-to-br group-hover:from-[rgba(255,215,0,0.25)] group-hover:to-[rgba(212,175,55,0.15)] group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)] group-hover:shadow-[0_6px_15px_rgba(255,215,0,0.3)]">
                    <svg class="w-12 h-12 text-[#ffd700] fill-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                </div>
                <h3 class="text-[22px] font-bold mb-[18px] text-[#ffd700] tracking-[0.5px]">Purity Standard</h3>
                <p class="text-sm text-[#cccccc] leading-[1.8]">
                    Every KBR asset is minted to the highest international standards of 999.9 fineness, certified by our master assayers.
                </p>
            </div>
            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-md p-[50px] px-9 text-center transition-all duration-300 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4),0_0_0_1px_rgba(255,215,0,0.1)_inset] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] before:opacity-60 before:transition-opacity before:duration-300 hover:-translate-y-2 hover:shadow-[0_12px_30px_rgba(255,215,0,0.3),0_0_0_1px_rgba(255,215,0,0.2)_inset] hover:border-[rgba(255,215,0,0.6)] hover:before:opacity-100 hover:before:h-1 group">
                <div class="w-[90px] h-[90px] mx-auto mb-6 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center transition-all duration-300 shadow-[0_4px_10px_rgba(255,215,0,0.2)] group-hover:bg-gradient-to-br group-hover:from-[rgba(255,215,0,0.25)] group-hover:to-[rgba(212,175,55,0.15)] group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)] group-hover:shadow-[0_6px_15px_rgba(255,215,0,0.3)]">
                    <svg class="w-12 h-12 text-[#ffd700] fill-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
                <h3 class="text-[22px] font-bold mb-[18px] text-[#ffd700] tracking-[0.5px]">Anti-Counterfeit</h3>
                <p class="text-sm text-[#cccccc] leading-[1.8]">
                    Advanced forensic security features including micro-engraving and digital serial tracking protect your investment.
                </p>
            </div>
            <div class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-md p-[50px] px-9 text-center transition-all duration-300 relative overflow-hidden shadow-[0_8px_20px_rgba(0,0,0,0.4),0_0_0_1px_rgba(255,215,0,0.1)_inset] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] before:opacity-60 before:transition-opacity before:duration-300 hover:-translate-y-2 hover:shadow-[0_12px_30px_rgba(255,215,0,0.3),0_0_0_1px_rgba(255,215,0,0.2)_inset] hover:border-[rgba(255,215,0,0.6)] hover:before:opacity-100 hover:before:h-1 group">
                <div class="w-[90px] h-[90px] mx-auto mb-6 bg-gradient-to-br from-[rgba(255,215,0,0.15)] to-[rgba(212,175,55,0.08)] border-2 border-[rgba(255,215,0,0.4)] rounded-md flex items-center justify-center transition-all duration-300 shadow-[0_4px_10px_rgba(255,215,0,0.2)] group-hover:bg-gradient-to-br group-hover:from-[rgba(255,215,0,0.25)] group-hover:to-[rgba(212,175,55,0.15)] group-hover:scale-110 group-hover:border-[rgba(255,215,0,0.7)] group-hover:shadow-[0_6px_15px_rgba(255,215,0,0.3)]">
                    <svg class="w-12 h-12 text-[#ffd700] fill-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                </div>
                <h3 class="text-[22px] font-bold mb-[18px] text-[#ffd700] tracking-[0.5px]">Digital Assay</h3>
                <p class="text-sm text-[#cccccc] leading-[1.8]">
                    Upon successful verification, you can download a digitally signed certificate of authenticity for your records.
                </p>
            </div>
        </div>
    </section>

    <!-- Trouble Verifying Section -->
    <section class="max-w-[1200px] my-20 mx-auto px-10">
        <div class="bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] p-[50px] px-[60px] rounded-xl flex flex-col md:flex-row justify-between items-center relative overflow-hidden text-center md:text-left gap-6">
            <div class="absolute -bottom-5 right-5 text-[200px] text-[rgba(26,26,26,0.1)] font-bold">?</div>
            <div class="flex-1 text-center md:text-left">
                <h2 class="text-4xl font-bold mb-4">Trouble verifying?</h2>
                <p class="text-base max-w-[500px] mx-auto md:mx-0">
                    Our security team is available 24/7 to assist with authentication inquiries and high-value asset confirmation.
                </p>
            </div>
            <a href="mailto:verification@karachibullion.com" class="w-full md:w-auto py-4 px-8 bg-[#1a1a1a] text-[#ffd700] border-2 border-[#1a1a1a] rounded-md text-base font-bold cursor-pointer transition-all duration-300 hover:bg-[#2a2a2a] whitespace-nowrap text-center">Speak to an Expert</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1a1a1a] px-[60px] pt-16 pb-8 mt-24">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-20 mb-10 md:gap-12">
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-[50px] h-[50px] bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-[28px]">🏛️</div>
                    <div class="flex flex-col">
                        <div class="text-[22px] font-bold text-[#ffd700] tracking-wide">KARACHI BULLION</div>
                        <div class="text-xs text-[#888] tracking-[0.5px]">EXCHANGE</div>
                    </div>
                </div>
                <p class="text-[15px] text-[#cccccc] leading-[1.9] max-w-[500px]">
                    The premier precious metals exchange in the region, committed to purity, ethics, and world-class craftsmanship since 1995.
                </p>
            </div>
            <div>
                <h3 class="text-base text-white mb-6 tracking-[1.5px] font-semibold">CONTACT US</h3>
                <div class="flex items-start gap-4 mb-5 text-[#cccccc] text-[15px] leading-relaxed">
                    <svg class="w-5 h-5 text-[#ffd700] mt-0.5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    <span>Main Bullion Market, Lyari, Karachi, Pakistan</span>
                </div>
                <div class="flex items-start gap-4 mb-5 text-[#cccccc] text-[15px] leading-relaxed">
                    <svg class="w-5 h-5 text-[#ffd700] mt-0.5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                    <span>+92 21 3456 7890</span>
                </div>
                <div class="flex items-start gap-4 mb-5 text-[#cccccc] text-[15px] leading-relaxed">
                    <svg class="w-5 h-5 text-[#ffd700] mt-0.5 flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    <span>verification@karachibullion.com</span>
                </div>
            </div>
        </div>
        <div class="max-w-[1200px] mx-auto pt-8 border-t border-[#333] flex justify-center items-center text-center">
            <div class="text-[13px] text-[#888] flex items-center gap-2.5 flex-wrap justify-center">
                <span>© 2026 Karachi Bullion Exchange. All Rights Reserved.</span>
                <span class="text-[#666]">|</span>
                <span class="text-[13px] text-[#888]">A Site by <a href="https://asdigitals.co" target="_blank" class="text-[#ffd700] font-semibold no-underline transition-colors duration-300 hover:text-[#d4af37]">AsDigitals.co</a></span>
            </div>
        </div>
    </footer>
</body>
</html>
