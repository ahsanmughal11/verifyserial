<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturedProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->is('admin/*')) {
            $products = FeaturedProduct::latest()->paginate(10);
            return view('admin.featured_products.index', compact('products'));
        }

        $query = FeaturedProduct::query();
        
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }
        
        $products = $query->latest()->paginate(12);
        
        return view('featured_products.index', compact('products'));
    }

    public function show(FeaturedProduct $featuredProduct)
    {
        return view('featured_products.show', compact('featuredProduct'));
    }

    public function create()
    {
        return view('admin.featured_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'description' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $storedPath = Storage::disk('public')->putFileAs('featured_products', $file, $fileName);
            $imagePath = 'storage/featured_products/' . $fileName;
        }

        FeaturedProduct::create([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.featured-products.index')->with('success', 'Featured Product added successfully!');
    }

    public function edit(FeaturedProduct $featuredProduct)
    {
        return view('admin.featured_products.edit', compact('featuredProduct'));
    }

    public function update(Request $request, FeaturedProduct $featuredProduct)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5056',
            'description' => 'required|string',
        ]);

        $imagePath = $featuredProduct->image;
        if ($request->hasFile('image')) {
            if ($featuredProduct->image && Storage::disk('public')->exists(str_replace('storage/', '', $featuredProduct->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $featuredProduct->image));
            }
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            Storage::disk('public')->putFileAs('featured_products', $file, $fileName);
            $imagePath = 'storage/featured_products/' . $fileName;
        }

        $featuredProduct->update([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.featured-products.index')->with('success', 'Featured Product updated successfully!');
    }

    public function destroy(FeaturedProduct $featuredProduct)
    {
        if ($featuredProduct->image && Storage::disk('public')->exists(str_replace('storage/', '', $featuredProduct->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $featuredProduct->image));
        }
        $featuredProduct->delete();
        return redirect()->route('admin.featured-products.index')->with('success', 'Featured Product deleted successfully!');
    }
}
