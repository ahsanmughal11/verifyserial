<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()
            ->with('categories')
            ->latest('publish_date')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'metaTitle' => 'Blog - Karachi Silver Enterprise',
            'metaDescription' => 'Read latest insights, updates, and guides from Karachi Silver Enterprise.',
        ]);
    }

    public function show(string $slug)
    {
        $post = BlogPost::published()
            ->with(['categories', 'tags'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = BlogPost::published()
            ->with('categories')
            ->where('id', '!=', $post->id)
            ->whereHas('categories', fn ($query) => $query->whereIn('blog_categories.id', $post->categories->pluck('id')))
            ->latest('publish_date')
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category(string $slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->published()
            ->with('categories')
            ->latest('publish_date')
            ->paginate(9);

        return view('blog.taxonomy', [
            'posts' => $posts,
            'title' => 'Category: ' . $category->name,
            'subtitle' => $category->description ?: 'Posts filed under this category.',
            'metaTitle' => $category->name . ' - Blog Category',
            'metaDescription' => Str::limit($category->description ?? '', 155) ?: 'Explore posts in ' . $category->name . '.',
        ]);
    }

    public function tag(string $slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()
            ->published()
            ->with('categories')
            ->latest('publish_date')
            ->paginate(9);

        return view('blog.taxonomy', [
            'posts' => $posts,
            'title' => 'Tag: ' . $tag->name,
            'subtitle' => 'Posts related to this topic.',
            'metaTitle' => $tag->name . ' - Blog Tag',
            'metaDescription' => 'Explore posts tagged with ' . $tag->name . '.',
        ]);
    }
}
