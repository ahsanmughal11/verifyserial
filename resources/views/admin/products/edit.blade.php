@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('breadcrumb')
    <span>/</span>
    <a href="{{ route('admin.products.index') }}" class="text-[#ffd700] no-underline hover:underline">Products</a>
    <span>/</span>
    <span>Edit</span>
@endsection

@section('header-actions')
    <a href="{{ route('admin.products.index') }}"
        class="py-2.5 px-5 border border-[#2a2a2a] text-[#ccc] rounded-md inline-flex items-center gap-2 text-sm font-semibold no-underline hover:bg-[#2a2a2a] hover:text-white transition-all duration-300">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
        </svg>
        Back to List
    </a>
@endsection

@section('content')
    <div class="max-w-[800px]">
        <div
            class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-10 relative before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] md:p-8 md:px-6">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="serial_number" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Serial Number
                        *</label>
                    <input type="text" id="serial_number" name="serial_number"
                        value="{{ old('serial_number', $product->serial_number) }}" required placeholder="e.g. KSE-999-XXXX"
                        class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('serial_number')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_name" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Name
                        *</label>
                    <input type="text" id="product_name" name="product_name"
                        value="{{ old('product_name', $product->product_name) }}" required placeholder="Enter product name"
                        class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('product_name')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <x-admin.file-upload name="product_picture" label="Product Picture" accept="image/*"
                            :currentImage="$product->product_picture" hint="Current image shown above. Click to replace." />
                        @error('product_picture')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <x-admin.file-upload name="xrf_image" label="XRF Image" accept="image/*"
                            :currentImage="$product->xrf_image" hint="XRF analysis image. Click to replace." />
                        @error('xrf_image')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-6">
                        <x-admin.date-picker name="manufacturing_date" label="Manufacturing Date *"
                            :value="old('manufacturing_date', $product->manufacturing_date->format('Y-m-d'))"
                            :showTime="false" />
                        @error('manufacturing_date')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="weight" class="block mb-2 text-sm text-[#ccc] font-semibold">Weight & Unit</label>
                        <div
                            class="flex bg-[#151515] border border-[#2a2a2a] rounded-md overflow-hidden focus-within:border-[#ffd700] transition-all">
                            <input type="number" id="weight" name="weight" value="{{ old('weight', $product->weight) }}"
                                step="0.01" min="0" placeholder="0.00"
                                class="flex-1 py-3 px-4 bg-transparent border-none text-white text-[15px] outline-none">
                            <div class="w-px bg-[#2a2a2a]"></div>
                            <select name="weight_unit" id="weight_unit"
                                class="py-3 px-4 bg-[#1a1a1a] border-none text-[#ffd700] text-sm font-semibold outline-none cursor-pointer">
                                <option value="tola" {{ old('weight_unit', $product->weight_unit ?? 'tola') == 'tola' ? 'selected' : '' }}>Tola</option>
                                <option value="gram" {{ old('weight_unit', $product->weight_unit) == 'gram' ? 'selected' : '' }}>Gram</option>
                            </select>
                        </div>
                        @error('weight')
                            <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="purity" class="block mb-2 text-sm text-[#ccc] font-semibold">Purity</label>
                    <input type="text" id="purity" name="purity" value="{{ old('purity', $product->purity) }}"
                        placeholder="e.g. 99.9% Pure Silver"
                        class="w-full py-3 px-4 bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700]">
                    @error('purity')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex gap-4 mt-10 pt-6 border-t border-[#2a2a2a]">
                    <button type="submit"
                        class="py-3 px-8 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] rounded-md text-sm font-bold border-none cursor-pointer hover:opacity-90 transition-opacity">Update
                        Product</button>
                    <a href="{{ route('admin.products.index') }}"
                        class="py-3 px-8 border border-[#2a2a2a] text-[#ccc] rounded-md text-sm no-underline hover:bg-[#333] transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection