<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Karachi Bullion Exchange</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans flex justify-center items-center min-h-screen m-0 bg-[#f5f5f5]">
    <div class="bg-white p-10 rounded-lg shadow-[0_2px_10px_rgba(0,0,0,0.1)] w-full max-w-[400px]">
        <h1 class="text-center mb-8 text-[#333]">Reset Password</h1>
        
        @if($errors->any())
            <div class="text-[#dc3545] mb-4 p-2.5 bg-[#f8d7da] border border-[#f5c6cb] rounded">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('status'))
            <div class="text-[#155724] mb-4 p-2.5 bg-[#d4edda] border border-[#c3e6cb] rounded">
                {{ session('status') }}
            </div>
        @endif

        <p class="mb-6 text-[#555]">Enter your email address and we will send you a link to reset your password.</p>

        <form method="POST" action="/forgot-password">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-1.5 text-[#555]">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full p-2.5 border border-[#ddd] rounded text-base box-border">
            </div>

            <button type="submit" class="w-full py-3 bg-[#007bff] text-white border-none rounded text-base cursor-pointer hover:bg-[#0056b3] transition-colors duration-300">Send Password Reset Link</button>
        </form>

        <div class="text-center mt-5">
            <a href="/login" class="text-[#666] no-underline">← Back to Login</a>
        </div>
    </div>
</body>
</html>
