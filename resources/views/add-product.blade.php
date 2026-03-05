<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Karachi Bullion Exchange</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] text-white min-h-screen p-5">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-[#ffd700]">Add Product</h1>
        
        @if(session('success'))
            <div class="mb-5 p-4 bg-[rgba(81,207,102,0.1)] border border-[rgba(81,207,102,0.3)] rounded-sm text-[#51cf66]">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        
        @if($errors->any())
            <div class="mb-5 p-4 bg-[rgba(255,107,107,0.1)] border border-[rgba(255,107,107,0.3)] rounded-sm text-[#ff6b6b]">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="/add-product" enctype="multipart/form-data" class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] border border-[rgba(255,215,0,0.3)] rounded-sm p-8 shadow-[0_8px_20px_rgba(0,0,0,0.4)]">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-[#cccccc] text-sm font-medium">Serial Number:</label>
                <input type="text" name="serial_number" value="{{ old('serial_number') }}" required class="w-full py-3 px-4 bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)]">
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 text-[#cccccc] text-sm font-medium">Product Name:</label>
                <input type="text" name="product_name" value="{{ old('product_name') }}" required class="w-full py-3 px-4 bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)]">
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 text-[#cccccc] text-sm font-medium">Product Picture:</label>
                <input type="file" name="product_picture" accept="image/*" class="w-full py-3 px-4 bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)]">
            </div>
            
            <div class="mb-6">
                <label class="block mb-2 text-[#cccccc] text-sm font-medium">Manufacturing Date:</label>
                <input type="date" name="manufacturing_date" value="{{ old('manufacturing_date') }}" required class="w-full py-3 px-4 bg-[#1a1a1a] border-2 border-[rgba(255,215,0,0.3)] rounded-sm text-white outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_10px_rgba(255,215,0,0.2)]">
            </div>
            
            <button type="submit" class="w-full py-4 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-sm text-base font-bold cursor-pointer transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)]">Add Product</button>
        </form>
        
        <p class="mt-6 text-center"><a href="/" class="text-[#ffd700] no-underline hover:text-[#d4af37] transition-colors duration-300">Back to Verification</a></p>
    </div>
</body>
</html>
