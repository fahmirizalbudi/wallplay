@extends('layouts.app')

@section('title', 'Trending Wallpapers | WallPlay Curator')
@section('description', 'Discover the most popular and trending high-definition wallpapers. Visual inspiration updated hourly by our global community.')

@section('content')

<header class="max-w-7xl mx-auto px-6 pt-16 pb-12">
    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-white tracking-tight mb-3">Trending masterpiece.</h1>
        <p class="text-[15px] text-gray-500 font-normal leading-relaxed">
            The most curated and high-demand visuals from our global community of artists and creators. 
            Updated hourly.
        </p>
    </div>

    <div class="mt-8 max-w-lg">
        <div class="relative flex items-center bg-[#18181a] border border-white/[0.05] rounded-lg px-4 py-2.5 transition-colors focus-within:border-white/10">
            <svg class="w-4 h-4 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" placeholder="Search trending themes" class="w-full bg-transparent border-none focus:ring-0 text-[14px] text-white placeholder-gray-600">
        </div>
    </div>
</header>

<div class="border-b border-white/[0.05] mb-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-8 text-[13px] font-medium text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-white py-4 transition-colors">Editorial</a>
            <a href="{{ route('wallpapers.trending') }}" class="text-white border-b border-white py-4 -mb-px">Trending</a>
            <a href="{{ route('wallpapers.categories') }}" class="hover:text-white py-4 transition-colors">Categories</a>
            
            @php $filters = ['Nature', 'Abstract', 'Architecture', 'Space']; @endphp
            @foreach($filters as $filter)
                <a href="{{ route('home', ['category' => $filter]) }}" class="hover:text-white py-4 transition-colors">{{ $filter }}</a>
            @endforeach
        </div>
    </div>
</div>

<section class="max-w-7xl mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($wallpapers as $wallpaper)
            <div class="group flex flex-col">
                <a href="{{ route('wallpapers.show', $wallpaper) }}" class="relative block aspect-[4/3] bg-[#18181a] rounded-sm overflow-hidden">
                    <img src="{{ $wallpaper->image_url }}" 
                         alt="{{ $wallpaper->title }}" 
                         class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-90">

                    <div class="absolute top-3 left-3">
                        <div class="flex items-center gap-1.5 px-2.5 py-1 bg-black/40 backdrop-blur-md border border-white/10 rounded-sm">
                            <span class="w-1 h-1 rounded-full bg-indigo-500 animate-pulse"></span>
                            <span class="text-[9px] font-medium text-gray-200 uppercase tracking-wider">
                                Trending
                            </span>
                        </div>
                    </div>

                    <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>

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
                <p class="text-gray-600 text-[14px]">No trending images yet.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-16 mb-20">
        {{ $wallpapers->links() }}
    </div>
</section>
@endsection


