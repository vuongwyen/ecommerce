<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    @if(isset($seo))
    <title>{{ $seo['title'] ?? config('app.name') }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Discover amazing products at BEAUTIFY' }}">
    <link rel="canonical" href="{{ $seo['canonical'] ?? request()->url() }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $seo['og_title'] ?? $seo['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $seo['og_description'] ?? $seo['description'] ?? 'Discover amazing products at BEAUTIFY' }}">
    <meta property="og:image" content="{{ $seo['og_image'] ?? asset('images/og-default.jpg') }}">
    <meta property="og:url" content="{{ $seo['og_url'] ?? request()->url() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="BEAUTIFY">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
    <meta name="twitter:title" content="{{ $seo['twitter_title'] ?? $seo['title'] ?? config('app.name') }}">
    <meta name="twitter:description" content="{{ $seo['twitter_description'] ?? $seo['description'] ?? 'Discover amazing products at BEAUTIFY' }}">
    <meta name="twitter:image" content="{{ $seo['twitter_image'] ?? $seo['og_image'] ?? asset('images/og-default.jpg') }}">
    @else
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Discover amazing products at BEAUTIFY">
    @endif

    <!-- Additional SEO Meta Tags -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="BEAUTIFY">
    <meta name="keywords" content="fashion, clothing, accessories, beauty, style, {{ $seo['keywords'] ?? '' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Schema.org Structured Data -->
    @if(isset($schema))
    <script type="application/ld+json">
        {
            !!$schema!!
        }
    </script>
    @endif

    <!-- Additional CSS for product detail page -->
    @if(request()->routeIs('product-detail'))
    <style>
        .zoom-container {
            position: relative;
            overflow: hidden;
        }

        .zoom-image {
            transition: transform 0.3s ease;
        }

        .zoom-container:hover .zoom-image {
            transform: scale(1.1);
        }

        .lazy-load {
            opacity: 0;
            transition: opacity 0.3s;
        }

        .lazy-load.loaded {
            opacity: 1;
        }
    </style>
    @endif
</head>

<body class="font-sans antialiased bg-gray-50">
    @livewire('partials.navbar')
    <main>
        @yield('content')
    </main>
    @livewire('partials.footer')
    @livewire('product-quick-view')
    @livewireScripts

    <!-- Lazy Loading Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy loading for images
            const lazyImages = document.querySelectorAll('img[data-src]');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.add('loaded');
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(img => imageObserver.observe(img));

            // Image zoom effect for product detail page
            const zoomContainers = document.querySelectorAll('.zoom-container');
            zoomContainers.forEach(container => {
                const image = container.querySelector('.zoom-image');
                if (image) {
                    container.addEventListener('mousemove', (e) => {
                        const rect = container.getBoundingClientRect();
                        const x = (e.clientX - rect.left) / rect.width;
                        const y = (e.clientY - rect.top) / rect.height;

                        image.style.transformOrigin = `${x * 100}% ${y * 100}%`;
                    });
                }
            });
        });
    </script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>