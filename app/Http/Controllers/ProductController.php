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

        Product::create([
            'serial_number' => $request->serial_number,
            'product_name' => $request->product_name,
            'product_picture' => $productPicturePath,
            'manufacturing_date' => $request->manufacturing_date,
            'weight' => $request->weight,
            'purity' => $request->purity,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
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

        $product->update([
            'serial_number' => $request->serial_number,
            'product_name' => $request->product_name,
            'product_picture' => $productPicturePath,
            'manufacturing_date' => $request->manufacturing_date,
            'weight' => $request->weight,
            'purity' => $request->purity,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete product picture if exists
        if ($product->product_picture && Storage::disk('public')->exists(str_replace('storage/', '', $product->product_picture))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $product->product_picture));
        }
        
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
