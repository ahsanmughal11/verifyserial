<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->meta_title ?: $post->title }}</title>
    <meta name="description" content="{{ $post->meta_description ?: $post->excerpt }}">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .blog-content { font-size: 1.125rem; line-height: 1.8; }
        .blog-content h1, .blog-content h2, .blog-content h3, .blog-content h4 { margin-top: 2rem; margin-bottom: 1rem; font-weight: 700; color: #ffd700; }
        .light-mode .blog-content h1, .light-mode .blog-content h2, .light-mode .blog-content h3, .light-mode .blog-content h4 { color: #b8860b; }
        .blog-content h2 { font-size: 1.875rem; }
        .blog-content h3 { font-size: 1.5rem; }
        .blog-content p { margin-bottom: 1.5rem; }
        .blog-content ul, .blog-content ol { margin-left: 1.5rem; margin-bottom: 1.5rem; list-style: revert; }
        .blog-content li { margin-bottom: 0.5rem; }
        .blog-content blockquote { border-left: 4px solid #d4af37; padding-left: 1.5rem; color: #bbb; margin: 2rem 0; font-style: italic; }
        .light-mode .blog-content blockquote { color: #555; background: #f9f9f9; padding: 1rem 1.5rem; }
        .blog-content pre { background: #111; padding: 1.5rem; border-radius: 0.5rem; overflow-x: auto; margin-bottom: 1.5rem; border: 1px solid #333; }
        .blog-content code { background: rgba(212, 175, 55, 0.1); padding: 0.2rem 0.4rem; border-radius: 0.25rem; font-size: 0.9em; }
        .blog-content img { max-width: 100%; height: auto; border-radius: 0.8rem; margin: 2rem auto; display: block; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        .light-mode .blog-content img { box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        
        /* Table Styling */
        .blog-content .table-wrapper { overflow-x: auto; margin-bottom: 2rem; border-radius: 0.5rem; border: 1px solid #333; }
        .light-mode .blog-content .table-wrapper { border: 1px solid #e5e5e5; }
        .blog-content table { width: 100%; border-collapse: collapse; text-align: left; }
        .blog-content th { background: #2a2a2a; color: #ffd700; font-weight: 600; padding: 1rem; border-bottom: 2px solid #333; }
        .light-mode .blog-content th { background: #f8f9fa; color: #b8860b; border-bottom: 2px solid #e5e5e5; }
        .blog-content td { padding: 1rem; border-bottom: 1px solid #333; }
        .light-mode .blog-content td { border-bottom: 1px solid #e5e5e5; }
        .blog-content tr:nth-child(even) { background: rgba(255,255,255,0.02); }
        .light-mode .blog-content tr:nth-child(even) { background: #fafafa; }
        .blog-content tr:hover { background: rgba(212, 175, 55, 0.05); }
        
        .blog-content a { color: #ffd700; text-decoration: underline; text-underline-offset: 4px; transition: color 0.2s; }
        .blog-content a:hover { color: #fff; }
        .light-mode .blog-content a:hover { color: #b8860b; }
    </style>
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')
    
    <article class="max-w-[950px] mx-auto py-14 px-6">
        <div class="text-sm text-[#888] mb-4">{{ optional($post->publish_date)->format('M d, Y') }}</div>
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>

        @if($post->featured_image)
            <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full max-h-[460px] object-cover rounded-lg mb-8">
        @endif

        <div class="blog-content text-[#e2e2e2] light-mode:text-[#222]">{!! $post->content_html !!}</div>

        <div class="mt-10 border-t border-[#2a2a2a] pt-6">
            <div class="mb-3">
                <span class="text-[#888] mr-2">Categories:</span>
                @foreach($post->categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" class="text-[#ffd700] no-underline mr-3">{{ $category->name }}</a>
                @endforeach
            </div>
            <div>
                <span class="text-[#888] mr-2">Tags:</span>
                @foreach($post->tags as $tag)
                    <a href="{{ route('blog.tag', $tag->slug) }}" class="text-[#ffd700] no-underline mr-3">#{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </article>

    @if($relatedPosts->count())
    <section class="max-w-[1200px] mx-auto px-6 pb-14">
        <h2 class="text-2xl font-semibold mb-5">Related Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($relatedPosts as $related)
                <a href="{{ route('blog.show', $related->slug) }}" class="no-underline block bg-[#212121] light-mode:bg-white border border-[#2a2a2a] rounded-lg p-5">
                    <div class="text-xs text-[#888] mb-1">{{ optional($related->publish_date)->format('M d, Y') }}</div>
                    <h3 class="text-lg font-semibold text-white light-mode:text-[#111]">{{ $related->title }}</h3>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    @include('partials.footer')
</body>
</html>
