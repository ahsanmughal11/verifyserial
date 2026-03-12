<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?? $title }}</title>
    <meta name="description" content="{{ $metaDescription ?? $subtitle }}">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    <header class="bg-[#1a1a1a] light-mode:bg-white px-[60px] py-5 border-b border-[#333] light-mode:border-[#e5e5e5]">
        <a href="{{ route('blog.index') }}" class="text-[#ffd700] no-underline">← Back to Blog</a>
    </header>

    <section class="max-w-[1200px] mx-auto py-16 px-10">
        <h1 class="text-4xl font-bold mb-3">{{ $title }}</h1>
        <p class="text-[#ccc] light-mode:text-[#444] mb-10">{{ $subtitle }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <article class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] light-mode:from-white light-mode:to-[#f4f4f4] border border-[rgba(255,215,0,0.25)] light-mode:border-[#ddd] rounded-lg overflow-hidden">
                    @if($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="text-xs text-[#888] mb-2">{{ optional($post->publish_date)->format('M d, Y') }}</div>
                        <h2 class="text-xl font-semibold mb-3"><a href="{{ route('blog.show', $post->slug) }}" class="no-underline hover:text-[#ffd700]">{{ $post->title }}</a></h2>
                        <p class="text-sm text-[#ccc] light-mode:text-[#444] mb-4">{{ $post->excerpt }}</p>
                    </div>
                </article>
            @empty
                <p class="text-[#888]">No posts found.</p>
            @endforelse
        </div>

        <div class="mt-8">{{ $posts->links() }}</div>
    </section>

    @include('partials.footer')
</body>
</html>
