<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    public function index()
    {
        $tags = BlogTag::withCount('posts')->orderBy('name')->paginate(16);

        return view('admin.blog.tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_tags,slug',
        ]);

        BlogTag::create($validated);

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(BlogTag $tag)
    {
        return view('admin.blog.tags.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, BlogTag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_tags,slug,' . $tag->id,
        ]);

        $tag->update($validated);

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(BlogTag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag deleted successfully.');
    }
}
