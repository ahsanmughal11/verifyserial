<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Authenticity - Karachi Silver Enterprise</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media print {
            @page {
                size: A4 portrait;
                margin: 5mm;
            }

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            body {
                background-color: white;
                padding: 0;
                margin: 0;
            }

            .header {
                margin-bottom: 5px;
                padding: 5px 0;
                max-width: 100%;
            }

            .logo-shield {
                width: 25px;
                height: 25px;
            }

            .logo-check {
                width: 15px;
                height: 15px;
            }

            .logo-text {
                font-size: 12px;
                color: #000 !important;
            }

            .header-actions {
                display: none;
            }

            .certificate-container {
                max-width: 100%;
                padding: 15px 20px;
                margin: 0;
                page-break-inside: avoid;
                page-break-before: avoid;
                border-radius: 6px;
                background: #f9f9f9 !important;
                min-height: auto;
                height: auto;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .certificate-content {
                display: flex;
                flex-direction: column;
                height: 100%;
                justify-content: space-between;
            }

            .cert-title-section {
                margin-bottom: 15px;
            }

            .official-badge {
                font-size: 9px;
                margin-bottom: 6px;
                padding: 5px 14px;
                background: linear-gradient(135deg, #d4af37, #ffd700) !important;
                color: #000 !important;
            }

            .main-title {
                font-size: 28px;
                margin-bottom: 8px;
                color: #000 !important;
            }

            .title-underline {
                width: 150px;
                height: 2px;
                background: linear-gradient(90deg, transparent, #ffd700, transparent) !important;
            }

            .verification-status {
                margin-bottom: 20px;
            }

            .status-icon {
                width: 50px;
                height: 50px;
                margin-bottom: 5px;
                background: linear-gradient(135deg, #d4af37, #ffd700) !important;
            }

            .status-check {
                width: 30px;
                height: 30px;
                color: #000 !important;
            }

            .verified-text {
                font-size: 20px;
                margin-bottom: 4px;
                color: #28a745 !important;
            }

            .genuine-text {
                font-size: 11px;
                color: #333 !important;
            }

            .product-info-section {
                gap: 25px;
                margin-bottom: 20px;
            }

            .product-info-grid {
                display: grid !important;
                grid-template-columns: 1fr 1fr !important;
                gap: 25px !important;
            }

            .product-image {
                max-width: 280px !important;
                max-height: 200px !important;
                margin-bottom: 5px;
            }

            .product-info-grid {
                margin-bottom: 15px !important;
                gap: 20px !important;
            }

            .product-info-grid img {
                max-width: 280px !important;
                max-height: 200px !important;
            }

            .product-series {
                font-size: 13px;
                color: #000 !important;
            }

            .product-details {
                gap: 12px;
            }

            .detail-label {
                font-size: 9px;
                margin-bottom: 4px;
                color: #666 !important;
            }

            .detail-value {
                font-size: 15px;
                color: #000 !important;
            }

            .purity-check {
                width: 14px;
                height: 14px;
                color: #ffd700 !important;
            }

            .cert-description {
                font-size: 11px;
                margin-bottom: 20px;
                padding: 0 10px;
                line-height: 1.5;
                color: #333 !important;
            }

            .cert-bottom {
                margin-top: auto;
            }

            .signature-icon {
                width: 45px;
                height: 45px;
                margin-bottom: 4px;
                background-color: #e0e0e0 !important;
                border: 1px solid #ccc !important;
            }

            .signature-symbol {
                font-size: 20px;
                color: #ffd700 !important;
            }

            .signature-label {
                font-size: 9px;
                margin-bottom: 3px;
                color: #666 !important;
            }

            .signature-name {
                font-size: 13px;
                color: #000 !important;
            }

            .verify-another-btn {
                display: none;
            }

            .footer {
                display: none;
            }
        }
    </style>
</head>

<body class="font-sans bg-[#1a1a1a] text-white min-h-screen p-5">
    @include('partials.header')

    <!-- Certificate Card -->
    <div
        class="max-w-[1000px] mx-auto bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border-2 border-[#ffd700] rounded-xl p-8 md:p-6 relative shadow-[0_10px_40px_rgba(0,0,0,0.5)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:bottom-0 before:bg-[radial-gradient(circle,rgba(255,215,0,0.1)_1px,transparent_1px)] before:bg-[length:20px_20px] before:opacity-30 before:pointer-events-none before:rounded-xl">
        <div class="relative z-10">
            <!-- Title Section -->
            <div class="text-center mb-4">
                <div class="text-[10px] text-[#d4af37] tracking-[1.5px] mb-1.5 uppercase">OFFICIAL DIGITAL CERTIFICATE
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Certificate of Authenticity</h1>
                <div class="w-[150px] h-0.5 bg-gradient-to-r from-transparent via-[#ffd700] to-transparent mx-auto">
                </div>
            </div>

            <!-- Verification Status -->
            <div class="text-center mb-6">
                <div
                    class="w-[70px] h-[70px] bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-full flex items-center justify-center mx-auto mb-3 shadow-[0_5px_20px_rgba(255,215,0,0.4)]">
                    <svg class="w-8 h-8 text-[#1a1a1a]" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                    </svg>
                </div>
                <div class="text-xl font-bold text-[#28a745] mb-1">Verified Authentic</div>
                <div class="text-xs text-[#cccccc]">Genuine Product Status</div>
            </div>

            <!-- Product & XRF Images Side by Side -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-6">
                <!-- Product Image (Left) -->
                <div class="text-center px-2">
                    <div class="text-[10px] text-[#d4af37] tracking-[1.5px] mb-3 uppercase font-semibold">Product Image
                    </div>
                    @if($product->product_picture)
                        <div class="bg-[#1a1a1a] border border-[#333] rounded-lg p-3 inline-block">
                            <img src="{{ asset($product->product_picture) }}" alt="{{ $product->product_name }}"
                                class="w-full max-w-[300px] h-auto max-h-[280px] mx-auto rounded-lg shadow-[0_5px_20px_rgba(0,0,0,0.5)]">
                        </div>
                    @else
                        <div class="bg-[#1a1a1a] border border-[#333] rounded-lg p-3 inline-block">
                            <div
                                class="flex items-center justify-center min-h-[150px] max-h-[280px] w-full max-w-[300px] mx-auto text-[#666] rounded-lg">
                                No Image Available
                            </div>
                        </div>
                    @endif
                    <div class="text-sm text-white font-semibold mt-2">{{ $product->product_name }}</div>
                </div>

                <!-- XRF Analysis Image (Right) -->
                <div class="text-center px-2">
                    <div class="text-[10px] text-[#d4af37] tracking-[1.5px] mb-3 uppercase font-semibold">XRF Analysis
                        Report</div>
                    @if($product->xrf_image)
                        <div class="bg-[#1a1a1a] border border-[#333] rounded-lg p-3 inline-block">
                            <img src="{{ asset($product->xrf_image) }}" alt="XRF Analysis - {{ $product->product_name }}"
                                class="w-full max-w-[300px] h-auto max-h-[280px] mx-auto rounded-lg shadow-[0_5px_20px_rgba(0,0,0,0.5)]">
                        </div>
                    @else
                        <div class="bg-[#1a1a1a] border border-[#333] rounded-lg p-3 inline-block">
                            <div
                                class="flex items-center justify-center min-h-[150px] max-h-[280px] w-full max-w-[300px] mx-auto text-[#666] rounded-lg">
                                No XRF Image
                            </div>
                        </div>
                    @endif
                    <div class="text-[11px] text-[#888] mt-2">X-Ray Fluorescence Analysis</div>
                </div>
            </div>

            <!-- Product Details Below Images -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6 bg-[#1a1a1a] border border-[#333] rounded-lg p-5">
                <div class="flex flex-col text-center">
                    <div class="text-[10px] text-[#888] uppercase tracking-wide mb-1">PRODUCT NAME</div>
                    <div class="text-base font-bold text-white">{{ $product->product_name }}</div>
                </div>
                <div class="flex flex-col text-center">
                    <div class="text-[10px] text-[#888] uppercase tracking-wide mb-1">SERIAL NUMBER</div>
                    <div class="text-base font-bold text-[#ffd700]">{{ $product->serial_number }}</div>
                </div>
                <div class="flex flex-col text-center">
                    <div class="text-[10px] text-[#888] uppercase tracking-wide mb-1">MANUFACTURED DATE</div>
                    <div class="text-base font-bold text-white">{{ $product->manufacturing_date->format('F d, Y') }}
                    </div>
                </div>
                @if($product->weight)
                    <div class="flex flex-col text-center">
                        <div class="text-[10px] text-[#888] uppercase tracking-wide mb-1">WEIGHT</div>
                        <div class="text-base font-bold text-white">{{ number_format($product->weight, 2) }}
                            {{ ucfirst($product->weight_unit ?? 'Tola') }}</div>
                    </div>
                @endif
                @if($product->purity)
                    <div class="flex flex-col text-center">
                        <div class="text-[10px] text-[#888] uppercase tracking-wide mb-1">PURITY RATING</div>
                        <div class="text-base font-bold text-white flex items-center justify-center gap-2">
                            {{ $product->purity }}
                            <svg class="w-4 h-4 text-[#ffd700]" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Certificate Description -->
            <div class="text-xs text-[#cccccc] leading-relaxed text-center mb-6 px-4">
                This digital certificate confirms that the item described has been inspected and meets the quality
                standards of Karachi Silver Enterprise.
            </div>

            <!-- Bottom Section -->
            <div class="flex justify-between items-end md:flex-col md:gap-4 md:items-center">
                <div class="flex flex-col items-start md:items-center">
                    <div
                        class="w-20 h-20 bg-[#333] rounded-lg flex items-center justify-center mb-2 border border-[#555]">
                        <img src="{{ asset('kbe-logo.png') }}" alt="KBE Logo" class="w-16 h-16 object-contain">
                    </div>
                    <div class="text-[10px] text-[#888] uppercase tracking-wide mb-0.5">DIGITAL SIGNATURE</div>
                    <div class="text-sm text-white italic">Chief Inspector, KSE</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verify Another Product Button (Outside Certificate) -->
    <div class="max-w-[1000px] mx-auto mt-8 text-center">
        <a href="/"
            class="verify-another-btn flex items-center justify-center gap-2.5 py-4 px-8 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-lg text-base font-bold cursor-pointer no-underline transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] inline-flex">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                <path
                    d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"
                    opacity="0.3" />
            </svg>
            Verify Another Product
        </a>
    </div>

    <!-- Footer -->
    <footer class="max-w-[1200px] mx-auto mt-16 text-center py-8 border-t border-[#333] light-mode:border-[#c0c0c0]">
        <ul class="flex justify-center items-center gap-4 list-none flex-wrap">
            <li class="flex items-center gap-4"><a href="{{ route('legal.terms') }}"
                    class="text-[#cccccc] light-mode:text-[#4a4a4a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700]">Terms
                    & Conditions</a></li>
            <li>
                <div class="w-1 h-1 bg-[#666] light-mode:bg-[#9a9a9a] rounded-full"></div>
            </li>
            <li class="flex items-center gap-4"><a href="{{ route('legal.privacy') }}"
                    class="text-[#cccccc] light-mode:text-[#4a4a4a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700]">Privacy
                    Policy</a></li>
            <li>
                <div class="w-1 h-1 bg-[#666] light-mode:bg-[#9a9a9a] rounded-full"></div>
            </li>
            <li class="flex items-center gap-4"><a href="{{ route('legal.cookies') }}"
                    class="text-[#cccccc] light-mode:text-[#4a4a4a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700]">Cookies
                    Policy</a></li>
            <li>
                <div class="w-1 h-1 bg-[#666] light-mode:bg-[#9a9a9a] rounded-full"></div>
            </li>
            <li class="flex items-center gap-4"><a href="{{ route('contact') }}"
                    class="text-[#cccccc] light-mode:text-[#4a4a4a] no-underline text-sm transition-colors duration-300 hover:text-[#ffd700]">Contact
                    Exchange</a></li>
        </ul>
    </footer>

    <script>
        function shareCertificate() {
            if (navigator.share) {
                navigator.share({
                    title: 'Certificate of Authenticity - {{ $product->product_name }}',
                    text: 'Verified authentic product from Karachi Silver Enterprise',
                    url: window.location.href
                }).catch(err => console.log('Error sharing', err));
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    alert('Certificate link copied to clipboard!');
                }).catch(err => console.log('Error copying', err));
            }
        }
    </script>
</body>

</html>