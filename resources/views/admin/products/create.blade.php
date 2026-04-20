@extends('layouts.admin')

@section('title', 'Add Product')
@section('page-title', 'Add New Product')

@section('breadcrumb')
    <span>/</span>
    <a href="{{ route('admin.products.index') }}" class="text-[#ffd700] no-underline hover:underline">Products</a>
    <span>/</span>
    <span>Add New</span>
@endsection

@section('content')
    <div class="max-w-[800px]">
        <div class="bg-gradient-to-br from-[#1f1f1f] to-[#1a1a1a] border border-[#2a2a2a] rounded-lg p-10 relative before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:bg-gradient-to-r before:from-[#ffd700] before:to-[#d4af37] md:p-8 md:px-6">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="serial_number" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Serial Number *</label>
                    <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number') }}" required placeholder="e.g. KBR-999-XXXX" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('serial_number')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_name" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Name *</label>
                    <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" required placeholder="Enter product name" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('product_name')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_picture" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Product Picture</label>
                    <input type="file" id="product_picture" name="product_picture" accept="image/*" onchange="previewImage(this, 'product_picture_preview')" class="w-full py-2.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] cursor-pointer file:py-2 file:px-4 file:bg-gradient-to-br file:from-[#d4af37] file:to-[#ffd700] file:text-[#1a1a1a] file:border-none file:rounded-md file:font-semibold file:cursor-pointer file:mr-2.5">
                    @error('product_picture')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                    <div id="product_picture_preview" class="mt-4 p-5 bg-[#151515] border border-[#2a2a2a] rounded-lg hidden">
                        <p class="text-[#888] text-[13px] mb-4 font-semibold">Preview:</p>
                        <img src="" alt="Preview" class="max-w-[250px] rounded-lg border border-[#2a2a2a]">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="xrf_image" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">XRF Image</label>
                    <input type="file" id="xrf_image" name="xrf_image" accept="image/*" onchange="previewImage(this, 'xrf_image_preview')" class="w-full py-2.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] cursor-pointer file:py-2 file:px-4 file:bg-gradient-to-br file:from-[#d4af37] file:to-[#ffd700] file:text-[#1a1a1a] file:border-none file:rounded-md file:font-semibold file:cursor-pointer file:mr-2.5">
                    <p class="text-[#666] text-[12px] mt-1.5">Upload the XRF (X-Ray Fluorescence) analysis image</p>
                    @error('xrf_image')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                    <div id="xrf_image_preview" class="mt-4 p-5 bg-[#151515] border border-[#2a2a2a] rounded-lg hidden">
                        <p class="text-[#888] text-[13px] mb-4 font-semibold">Preview:</p>
                        <img src="" alt="Preview" class="max-w-[250px] rounded-lg border border-[#2a2a2a]">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="manufacturing_date" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Manufacturing Date *</label>
                    <div class="relative">
                        <input type="date" id="manufacturing_date" name="manufacturing_date" value="{{ old('manufacturing_date') }}" required class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] [color-scheme:dark]">
                    </div>
                    @error('manufacturing_date')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="weight" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Weight</label>
                    <div class="flex gap-3">
                        <input type="number" id="weight" name="weight" value="{{ old('weight') }}" step="0.01" min="0" placeholder="e.g. 1.00" class="flex-1 py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                        <select name="weight_unit" id="weight_unit" class="w-[130px] py-3.5 px-[14px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)] cursor-pointer appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23ffd700%22%3E%3Cpath%20d%3D%22M7%2010l5%205%205-5z%22%2F%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[right_12px_center]">
                            <option value="tola" {{ old('weight_unit', 'tola') == 'tola' ? 'selected' : '' }}>Tola</option>
                            <option value="gram" {{ old('weight_unit') == 'gram' ? 'selected' : '' }}>Gram</option>
                        </select>
                    </div>
                    @error('weight')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="purity" class="block mb-2.5 text-[#cccccc] text-sm font-semibold">Purity</label>
                    <input type="text" id="purity" name="purity" value="{{ old('purity') }}" placeholder="e.g. 99.9% Pure Silver" class="w-full py-3.5 px-[18px] bg-[#151515] border border-[#2a2a2a] rounded-md text-white text-[15px] outline-none transition-all duration-300 focus:border-[#ffd700] focus:shadow-[0_0_0_3px_rgba(255,215,0,0.1)]">
                    @error('purity')
                        <div class="text-[#ff6b6b] mt-2 text-[13px]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex gap-4 mt-8 pt-6 border-t border-[#2a2a2a] md:flex-col">
                    <button type="submit" class="py-3.5 px-7 bg-gradient-to-br from-[#d4af37] to-[#ffd700] text-[#1a1a1a] border-none rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_5px_15px_rgba(255,215,0,0.4)] cursor-pointer md:w-full md:justify-center">Add Product</button>
                    <a href="{{ route('admin.products.index') }}" class="py-3.5 px-7 bg-transparent text-[#cccccc] border border-[#2a2a2a] rounded-md inline-flex items-center gap-2 text-[15px] font-semibold transition-all duration-300 no-underline hover:bg-[#2a2a2a] hover:text-white md:w-full md:justify-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const img = preview.querySelector('img');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.classList.add('hidden');
                img.src = '';
            }
        }
    </script>
@endsection
