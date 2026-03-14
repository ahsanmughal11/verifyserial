@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('breadcrumb')
    <span>/</span>
    <a href="{{ route('admin.products.index') }}" class="text-[#ffd700] no-underline hover:underline">Products</a>
    <span>/</span>
    <span>Edit</span>
@endsection

@section('content')
    <div class="max-w-[800px]">
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-10 relative before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] md:p-8 md:px-6">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="serial_number" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Serial Number *</label>
                    <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number', $product->serial_number) }}" required placeholder="e.g. KBR-999-XXXX" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('serial_number')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_name" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Name *</label>
                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" required placeholder="Enter product name" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('product_name')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_picture" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Picture</label>
                    <input type="file" id="product_picture" name="product_picture" accept="image/*" class="w-full py-2.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] cursor-pointer file:py-2 file:px-4 file:bg-gradient-to-br file:from-[#d4af37] file:to-[#ffd700] file:text-[#1a1a1a] file:border-none file:rounded-md file:font-semibold file:cursor-pointer file:mr-2.5">
                    @error('product_picture')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                    @if($product->product_picture)
                        <div class="mt-4 p-5 bg-[#151515] border border-[#2a2a2a] rounded-lg">
                            <p class="text-[#888] text-[13px] mb-4 font-semibold">Current Image:</p>
                            <img src="{{ asset($product->product_picture) }}" alt="{{ $product->product_name }}" class="max-w-[250px] rounded-lg border border-[#2a2a2a]">
                        </div>
                    @endif
                </div>

                <div class="mb-6">
                    <label for="manufacturing_date" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Manufacturing Date *</label>
                    <input type="date" id="manufacturing_date" name="manufacturing_date" value="{{ old('manufacturing_date', $product->manufacturing_date->format('Y-m-d')) }}" required class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('manufacturing_date')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="weight" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Weight (in Tola)</label>
                    <input type="number" id="weight" name="weight" value="{{ old('weight', $product->weight) }}" step="0.01" min="0" placeholder="e.g. 1.00" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('weight')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="purity" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Purity</label>
                    <input type="text" id="purity" name="purity" value="{{ old('purity', $product->purity) }}" placeholder="e.g. 99.9% Pure Silver" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('purity')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex gap-4 mt-8 pt-6 border-t border-[#2a2a2a] md:flex-col">
                    <button type="submit" class="py-3.5 px-7 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer md:w-full md:justify-center">Update Product</button>
                    <a href="{{ route('admin.products.index') }}" class="py-3.5 px-7 bg-transparent text-[#cccccc] border border-[#2a2a2a] rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 no-underline hover:bg-[#2a2a2a] hover:text-white md:w-full md:justify-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
