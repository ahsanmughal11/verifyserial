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
        .blog-content h1, .blog-content h2, .blog-content h3 { margin-top: 1.2rem; margin-bottom: 0.8rem; font-weight: 700; }
        .blog-content p { margin-bottom: 1rem; }
        .blog-content ul, .blog-content ol { margin-left: 1.2rem; margin-bottom: 1rem; list-style: revert; }
        .blog-content blockquote { border-left: 3px solid #d4af37; padding-left: 1rem; color: #bbb; margin: 1rem 0; }
        .blog-content pre { background: #111; padding: 1rem; border-radius: 0.4rem; overflow-x: auto; margin-bottom: 1rem; }
        .blog-content img { max-width: 100%; height: auto; border-radius: 0.4rem; margin: 1rem 0; }
    </style>
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    <header class="bg-[#1a1a1a] light-mode:bg-white px-[60px] py-5 flex justify-between items-center border-b border-[#333] light-mode:border-[#e5e5e5] md:px-8 md:flex-wrap transition-colors duration-300 light-mode:shadow-sm">
        <a href="{{ route('blog.index') }}" class="text-[#ffd700] no-underline">← Back to Blog</a>
    </header>

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
