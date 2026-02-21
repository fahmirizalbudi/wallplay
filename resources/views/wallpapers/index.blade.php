{{--
|--------------------------------------------------------------------------
| Editorial Feed View
|--------------------------------------------------------------------------
|
| Displays the primary paginated feed of wallpapers.
| Supports category filtering and full-text search integration.
|
| @param \Illuminate\Pagination\LengthAwarePaginator $wallpapers
|
--}}
@extends('layouts.app')

@section('title', 'WallPlay | Explore Premium Minimalist Wallpapers')
@section('description', 'Browse our curated feed of high-quality stock wallpapers. Discover minimalist, nature, and architectural visuals for your next project.')

@section('content')

<header class="max-w-7xl mx-auto px-6 pt-16 pb-12">
    <div class="max-w-2xl">
        <h1 class="text-3xl font-semibold text-white tracking-tight mb-3">The best free stock wallpapers.</h1>
        <p class="text-[15px] text-gray-500 font-normal leading-relaxed">
            Beautiful, high-quality images and photos that you can download and use for any project. 
            No attribution required.
        </p>
    </div>

    <div class="mt-8 max-w-lg">
        <form action="{{ route('home') }}" method="GET" class="relative flex items-center bg-[#18181a] border border-white/[0.05] rounded-lg px-4 py-2.5 transition-colors focus-within:border-white/10">
            <svg class="w-4 h-4 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" name="search" placeholder="Search high-resolution images" class="w-full bg-transparent border-none focus:ring-0 text-[14px] text-white placeholder-gray-600" value="{{ request('search') }}">
        </form>
        <div class="mt-3 flex gap-3 text-[12px] text-gray-600 font-medium">
            <span>Trending:</span>
            <a href="{{ route('home', ['search' => 'Nature']) }}" class="hover:text-white transition-colors">Nature</a>
            <a href="{{ route('home', ['search' => 'Architecture']) }}" class="hover:text-white transition-colors">Architecture</a>
            <a href="{{ route('home', ['search' => 'Minimal']) }}" class="hover:text-white transition-colors">Minimal</a>
        </div>
    </div>
</header>

<div class="border-b border-white/[0.05] mb-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-8 text-[13px] font-medium text-gray-500">
            <a href="{{ route('home') }}" class="{{ !request('category') ? 'text-white border-b border-white' : 'hover:text-white' }} py-4 -mb-px transition-colors">Editorial</a>
            <a href="{{ route('wallpapers.trending') }}" class="hover:text-white py-4 transition-colors">Trending</a>
            <a href="{{ route('wallpapers.categories') }}" class="hover:text-white py-4 transition-colors">Categories</a>
            
            @php $filters = ['Nature', 'Abstract', 'Architecture', 'Space']; @endphp
            @foreach($filters as $filter)
                <a href="{{ route('home', ['category' => $filter]) }}" class="{{ request('category') == $filter ? 'text-white border-b border-white' : 'hover:text-white' }} py-4 transition-colors">{{ $filter }}</a>
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
                <p class="text-gray-600 text-[14px]">No images found.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-16 mb-20">
        {{ $wallpapers->links() }}
    </div>
</section>
@endsection


