<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?? 'Blog' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Blog posts' }}">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    <header class="bg-[#1a1a1a] light-mode:bg-white px-[60px] py-5 flex justify-between items-center border-b border-[#333] light-mode:border-[#e5e5e5] md:px-8 md:flex-wrap transition-colors duration-300 light-mode:shadow-sm">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-3 no-underline">
                <div class="w-10 h-10 bg-gradient-to-br from-[#d4af37] to-[#ffd700] rounded-sm flex items-center justify-center text-2xl">🏛️</div>
                <div class="flex flex-col">
                    <div class="text-xl font-bold text-[#ffd700] light-mode:text-[#b8860b] tracking-wide">KARACHI BULLION</div>
                    <div class="text-[11px] text-[#cccccc] light-mode:text-[#5a5a5a] tracking-[0.5px]">EXCHANGE</div>
                </div>
            </a>
        </div>
        <nav class="md:order-3 md:w-full md:flex md:justify-center md:mt-4">
            <ul class="flex gap-[30px] list-none">
                <li><a href="/" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm">Verification</a></li>
                <li><a href="{{ route('blog.index') }}" class="text-[#ffd700] no-underline text-sm">Blog</a></li>
                <li><a href="{{ route('about') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm">About</a></li>
                <li><a href="{{ route('contact') }}" class="text-white light-mode:text-[#1a1a1a] no-underline text-sm">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="max-w-[1200px] mx-auto py-16 px-10">
        <h1 class="text-5xl font-bold mb-4">KBE Blog</h1>
        <p class="text-[#ccc] light-mode:text-[#444] mb-10">Insights, guides, and updates from Karachi Bullion Exchange.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <article class="bg-gradient-to-br from-[#2a2a2a] to-[#1f1f1f] light-mode:from-white light-mode:to-[#f4f4f4] border border-[rgba(255,215,0,0.25)] light-mode:border-[#ddd] rounded-lg overflow-hidden">
                    @if($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="text-xs text-[#888] mb-2">
                            {{ optional($post->publish_date)->format('M d, Y') }}
                            @if($post->categories->first())
                                • <a class="text-[#ffd700] no-underline" href="{{ route('blog.category', $post->categories->first()->slug) }}">{{ $post->categories->first()->name }}</a>
                            @endif
                        </div>
                        <h2 class="text-xl font-semibold mb-3"><a href="{{ route('blog.show', $post->slug) }}" class="no-underline hover:text-[#ffd700]">{{ $post->title }}</a></h2>
                        <p class="text-sm text-[#ccc] light-mode:text-[#444] mb-4">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-[#ffd700] no-underline text-sm font-semibold">Read More</a>
                    </div>
                </article>
            @empty
                <p class="text-[#888]">No published posts yet.</p>
            @endforelse
        </div>

        <div class="mt-8">{{ $posts->links() }}</div>
    </section>

    @include('partials.footer')
</body>
</html>
