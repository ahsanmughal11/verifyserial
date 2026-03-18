<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?? $title }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="description" content="{{ $metaDescription ?? $subtitle }}">
    @include('partials.theme-script')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-[#1a1a1a] light-mode:bg-[#fafafa] text-white light-mode:text-[#1a1a1a] leading-relaxed transition-colors duration-300">
    @include('partials.header')

    <section class="max-w-[1200px] mx-auto py-16 px-10">
        <h1 class="text-4xl font-bold mb-3">{{ $title }}</h1>
        <p class="text-[#ccc] light-mode:text-[#444] mb-10">{{ $subtitle }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <article class="bg-theme-gradient border border-theme-light rounded-lg overflow-hidden shadow-[0_8px_20px_var(--shadow-color)] transition-all duration-300 hover:-translate-y-1">
                    @if($post->featured_image)
                        <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="text-xs text-theme-muted mb-2 flex items-center gap-2">
                            <span>{{ optional($post->publish_date)->format('M d, Y') }}</span>
                        </div>
                        <h2 class="text-xl font-bold mb-3">
                            <a href="{{ route('blog.show', $post->slug) }}" class="no-underline text-theme-primary hover:text-theme-gold transition-colors duration-300">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-sm text-theme-secondary mb-4 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $post->slug) }}" class="text-theme-gold no-underline text-sm font-bold uppercase tracking-wider flex items-center gap-2 hover:gap-3 transition-all duration-300">
                            Read More
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
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
