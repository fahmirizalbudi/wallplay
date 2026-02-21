@extends('layouts.app')

@section('content')
<!-- Minimal Header -->
<header class="max-w-7xl mx-auto px-6 pt-16 pb-12">
    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-white tracking-tight mb-3">{{ $category }} Collection.</h1>
        <p class="text-[15px] text-gray-500 font-normal leading-relaxed">
            Browse through our curated selection of high-quality images within the {{ strtolower($category) }} 
            category. Each piece is hand-picked for its visual excellence.
        </p>
    </div>
</header>

<!-- Filter Sub-nav (Re-used) -->
<div class="border-b border-white/[0.05] mb-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-8 text-[13px] font-medium text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-white py-4 transition-colors">Editorial</a>
            <a href="{{ route('wallpapers.trending') }}" class="hover:text-white py-4 transition-colors">Trending</a>
            <a href="{{ route('wallpapers.categories') }}" class="hover:text-white py-4 transition-colors">Categories</a>
            <a href="#" class="text-white border-b border-white py-4 -mb-px">{{ $category }}</a>
        </div>
    </div>
</div>

<!-- Wallpaper Grid -->
<section class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($wallpapers as $wallpaper)
            <div class="group flex flex-col">
                <a href="{{ route('wallpapers.show', $wallpaper) }}" class="relative block aspect-[4/3] bg-[#18181a] rounded-sm overflow-hidden">
                    <img src="{{ $wallpaper->image_url }}" 
                         alt="{{ $wallpaper->title }}" 
                         class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-90">
                    
                    <!-- Subtle overlay on hover -->
                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    
                    <!-- Small, functional download button -->
                    <div class="absolute bottom-4 right-4 translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all">
                        <button class="bg-white/90 hover:bg-white text-black p-2 rounded-sm shadow-sm transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                        </button>
                    </div>
                </a>
                
                <div class="mt-3 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-indigo-500/20 flex items-center justify-center">
                            <span class="text-[9px] font-bold text-indigo-400">W</span>
                        </div>
                        <span class="text-[12px] font-medium text-gray-400 group-hover:text-white transition-colors">
                            {{ $wallpaper->title }}
                        </span>
                    </div>
                    <span class="text-[10px] font-semibold text-gray-600 uppercase tracking-tight">
                        {{ $wallpaper->category }}
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-gray-600 text-[14px]">No images found in this collection.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-16 mb-20">
        {{ $wallpapers->links() }}
    </div>
</section>
@endsection

