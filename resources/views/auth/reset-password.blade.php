<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Karachi Silver Enterprise</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans bg-[#1a1a1a] text-white min-h-screen flex justify-center items-center relative overflow-hidden before:content-[''] before:absolute before:top-1/2 before:left-1/2 before:-translate-x-1/2 before:-translate-y-1/2 before:w-[800px] before:h-[800px] before:bg-[radial-gradient(circle,rgba(255,215,0,0.1)_0%,rgba(212,175,55,0.05)_30%,transparent_70%)] before:pointer-events-none before:z-0">
    <div
        class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-sm p-[50px] px-10 w-full max-w-[450px] shadow-[0_8px_20px_rgba(0,0,0,0.4),0_0_0_1px_rgba(255,215,0,0.1)_inset] relative z-10 before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-[3px] before:bg-[linear-gradient(90deg,transparent,#ffd700,#d4af37,#ffd700,transparent)] before:opacity-60">

        {{-- Brand --}}
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-3 mb-5">
                <div
                    class="w-[50px] h-[50px] bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-[28px]">
                    🏛️</div>
                <div class="flex flex-col">
                    <div class="text-[22px] font-bold text-[#ffd700] tracking-wide">KARACHI SILVER</div>
                    <div class="text-xs text-[#cccccc] tracking-[0.5px]">ENTERPRISE</div>
                </div>
            </div>
            <h1 class="text-2xl font-bold text-white mb-2.5 text-center">Reset Password</h1>
            <p class="text-sm text-[#888] text-center">Enter your new password below</p>
        </div>

        @if($errors->any())
            <div
                class="text-[#ff6b6b] mb-5 py-3 px-4 bg-[rgba(255,107,107,0.1)] border border-[rgba(255,107,107,0.3)] rounded-sm text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/reset-password">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-6">
                <label for="email" class="block mb-2 text-[#cccccc] text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" value="{{ $email }}" required autofocus
                    placeholder="Your email address"
                    class="w-full py-3.5 px-[18px] bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)] placeholder:text-[#666]">
            </div>

            <div class="mb-6">
                <label for="password" class="block mb-2 text-[#cccccc] text-sm font-medium">New Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter new password"
                    class="w-full py-3.5 px-[18px] bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)] placeholder:text-[#666]">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 text-[#cccccc] text-sm font-medium">Confirm New
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    placeholder="Confirm new password"
                    class="w-full py-3.5 px-[18px] bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)] placeholder:text-[#666]">
            </div>

            <button type="submit"
                class="w-full py-4 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-sm text-base font-bold cursor-pointer transition-all duration-300 mb-5 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)]">
                Reset Password
            </button>
        </form>

        <div class="text-center mt-5 pt-5 border-t border-[#333]">
            <a href="/login"
                class="text-[#cccccc] no-underline text-sm inline-flex items-center justify-center gap-2 transition-colors duration-300 hover:text-[#ffd700]">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                </svg>
                Back to Login
            </a>
        </div>
    </div>
</body>

</html>