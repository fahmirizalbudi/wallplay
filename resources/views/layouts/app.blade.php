<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WallPlay | Premium Minimalist Wallpapers')</title>
    <meta name="description" content="@yield('description', 'Discover a curated collection of high-definition minimalist wallpapers designed by the world\'s best creators.')">
    <meta name="keywords" content="wallpapers, minimalist, high-resolution, design, nature, architecture, space, 4k">
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'WallPlay | Premium Minimalist Wallpapers')">
    <meta property="og:description" content="@yield('description', 'Discover a curated collection of high-definition minimalist wallpapers.')">
    <meta property="og:image" content="@yield('og_image', asset('favicon.svg'))">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'WallPlay | Premium Minimalist Wallpapers')">
    <meta property="twitter:description" content="@yield('description', 'Discover a curated collection of high-definition minimalist wallpapers.')">
    <meta property="twitter:image" content="@yield('og_image', asset('favicon.svg'))">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        body {
            font-family: 'Lexend', sans-serif;
            background-color: #0b0b0c;
            color: #d1d1d6;
        }
        .nav-blur {
            background: rgba(11, 11, 12, 0.8);
            backdrop-filter: saturate(180%) blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .btn-primary {
            background-color: #ffffff;
            color: #000000;
            transition: opacity 0.2s ease;
        }
        .btn-primary:hover {
            opacity: 0.9;
        }
        
        input:focus { outline: none; }
    </style>
</head>
<body class="antialiased selection:bg-indigo-500/30" x-data="{ searchOpen: false }">
    <div x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] bg-[#0b0b0c]/95 backdrop-blur-xl flex items-center justify-center px-6"
         @keydown.escape.window="searchOpen = false"
         style="display: none;">
        
        <button @click="searchOpen = false" class="absolute top-8 right-8 text-gray-500 hover:text-white transition-colors">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>

        <div class="w-full max-w-2xl">
            <form action="{{ route('home') }}" method="GET">
                <input type="text" 
                       name="search" 
                       placeholder="Type to search wallpapers..." 
                       class="w-full bg-transparent border-b border-white/10 py-6 text-3xl sm:text-5xl font-light text-white placeholder-gray-800 focus:border-indigo-500 focus:ring-0 transition-all outline-none"
                       x-ref="searchInput">
                <p class="mt-6 text-[11px] font-bold text-gray-600 uppercase tracking-[0.2em]">Press enter to search or esc to close</p>
            </form>
        </div>
    </div>

    <nav class="sticky top-0 z-50 nav-blur h-14 flex items-center px-6">
        <div class="max-w-7xl mx-auto w-full flex items-center justify-between">
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.5 10C9.32843 10 10 9.32843 10 8.5C10 7.67157 9.32843 7 8.5 7C7.67157 7 7 7.67157 7 8.5C7 9.32843 7.67157 10 8.5 10Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 15L16 10L5 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-sm font-semibold tracking-tight text-white uppercase">Wallplay</span>
                </a>
                <div class="hidden md:flex items-center gap-6 text-[13px] font-medium text-gray-400">
                    <a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'text-white' : 'hover:text-white' }} transition-colors">Explore</a>
                    <a href="{{ route('wallpapers.trending') }}" class="{{ Route::currentRouteName() == 'wallpapers.trending' ? 'text-white' : 'hover:text-white' }} transition-colors">Trending</a>
                    <a href="{{ route('wallpapers.categories') }}" class="{{ in_array(Route::currentRouteName(), ['wallpapers.categories', 'wallpapers.category']) ? 'text-white' : 'hover:text-white' }} transition-colors">Categories</a>
                </div>
            </div>
            
            <div class="flex items-center gap-6">
                <button @click="searchOpen = true; $nextTick(() => $refs.searchInput.focus())" class="text-gray-400 hover:text-white transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
                <style>
                    @keyframes textShimmer {
                        0% { background-position: -200% 0; }
                        100% { background-position: 200% 0; }
                    }
                    .shimmer-text {
                        background: linear-gradient(90deg, #4b5563 0%, #ffffff 50%, #4b5563 100%);
                        background-size: 200% auto;
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        animation: textShimmer 4s linear infinite;
                    }
                </style>
                <a href="{{ route('wallpapers.create') }}" class="flex items-center gap-2 px-2">
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-40"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-indigo-500/80"></span>
                    </span>
                    
                    <span class="shimmer-text text-[10px] font-bold uppercase tracking-[0.25em]">
                        Contribute
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="mt-20 border-t border-white/[0.05] py-10 px-6">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 text-[12px] text-gray-500 font-medium">
            <p>&copy; {{ date('Y') }} Wallplay. High resolution curation.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">Instagram</a>
                <a href="#" class="hover:text-white transition-colors">Twitter</a>
                <a href="#" class="hover:text-white transition-colors">Privacy</a>
            </div>
        </div>
    </footer>
</body>
</html>

