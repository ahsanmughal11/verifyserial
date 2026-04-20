<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|unique:products,serial_number',
            'product_name' => 'required|string',
            'product_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'xrf_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'manufacturing_date' => 'required|date',
            'weight' => 'nullable|numeric|min:0',
            'purity' => 'nullable|string|max:255',
        ]);

        $productPicturePath = null;
        
        if ($request->hasFile('product_picture')) {
            $file = $request->file('product_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $storedPath = Storage::disk('public')->putFileAs('products', $file, $fileName);
            $productPicturePath = 'storage/products/' . $fileName;
        }

        $xrfImagePath = null;

        if ($request->hasFile('xrf_image')) {
            $file = $request->file('xrf_image');
            $fileName = time() . '_xrf_' . $file->getClientOriginalName();
            $storedPath = Storage::disk('public')->putFileAs('products', $file, $fileName);
            $xrfImagePath = 'storage/products/' . $fileName;
        }

        Product::create([
            'serial_number' => $request->serial_number,
            'product_name' => $request->product_name,
            'product_picture' => $productPicturePath,
            'xrf_image' => $xrfImagePath,
            'manufacturing_date' => $request->manufacturing_date,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit ?? 'tola',
            'purity' => $request->purity,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'serial_number' => 'required|unique:products,serial_number,' . $product->id,
            'product_name' => 'required|string',
            'product_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'xrf_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'manufacturing_date' => 'required|date',
            'weight' => 'nullable|numeric|min:0',
            'purity' => 'nullable|string|max:255',
        ]);

        $productPicturePath = $product->product_picture;
        
        if ($request->hasFile('product_picture')) {
            // Delete old picture if exists
            if ($product->product_picture && Storage::disk('public')->exists(str_replace('storage/', '', $product->product_picture))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->product_picture));
            }
            
            $file = $request->file('product_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $storedPath = Storage::disk('public')->putFileAs('products', $file, $fileName);
            $productPicturePath = 'storage/products/' . $fileName;
        }

        $xrfImagePath = $product->xrf_image;

        if ($request->hasFile('xrf_image')) {
            // Delete old XRF image if exists
            if ($product->xrf_image && Storage::disk('public')->exists(str_replace('storage/', '', $product->xrf_image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->xrf_image));
            }

            $file = $request->file('xrf_image');
            $fileName = time() . '_xrf_' . $file->getClientOriginalName();
            $storedPath = Storage::disk('public')->putFileAs('products', $file, $fileName);
            $xrfImagePath = 'storage/products/' . $fileName;
        }

        $product->update([
            'serial_number' => $request->serial_number,
            'product_name' => $request->product_name,
            'product_picture' => $productPicturePath,
            'xrf_image' => $xrfImagePath,
            'manufacturing_date' => $request->manufacturing_date,
            'weight' => $request->weight,
            'weight_unit' => $request->weight_unit ?? 'tola',
            'purity' => $request->purity,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete product picture if exists
        if ($product->product_picture && Storage::disk('public')->exists(str_replace('storage/', '', $product->product_picture))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->product_picture));
        }

        // Delete XRF image if exists
        if ($product->xrf_image && Storage::disk('public')->exists(str_replace('storage/', '', $product->xrf_image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->xrf_image));
        }
        
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}
