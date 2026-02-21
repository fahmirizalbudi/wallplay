{{--
|--------------------------------------------------------------------------
| Wallpaper Detail View
|--------------------------------------------------------------------------
|
| Displays comprehensive information for a single wallpaper record.
| Includes resolution data, category tagging, and download triggers.
|
| @param \App\Models\Wallpaper $wallpaper
|
--}}
@extends('layouts.app')

@section('title', $wallpaper->title . ' | WallPlay High-Resolution')
@section('description', $wallpaper->description ?? 'Download ' . $wallpaper->title . ' in high resolution. A premium minimalist wallpaper from the WallPlay archives.')
@section('og_image', $wallpaper->image_url)

@section('content')
<div class="max-w-7xl mx-auto px-6 pt-12 pb-24">
    
    <div class="mb-10">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-[13px] font-medium text-gray-500 hover:text-white transition-colors group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Back to Editorial
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <div class="lg:col-span-8">
            <div class="bg-[#18181a] rounded-sm overflow-hidden border border-white/[0.05] shadow-2xl">
                <img src="{{ $wallpaper->image_url }}" alt="{{ $wallpaper->title }}" class="w-full h-auto object-contain bg-black max-h-[80vh]">
            </div>
        </div>

        <div class="lg:col-span-4 flex flex-col justify-start">
            <div class="sticky top-24">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-full bg-indigo-500/10 flex items-center justify-center">
                        <span class="text-[11px] font-bold text-indigo-400 uppercase">W</span>
                    </div>
                    <div>
                        <p class="text-[13px] font-semibold text-white tracking-tight leading-none">{{ $wallpaper->title }}</p>
                    </div>
                </div>

                <h1 class="text-2xl font-semibold text-white tracking-tight mb-4 leading-tight">
                    {{ $wallpaper->title }}
                </h1>
                
                <p class="text-[14px] text-gray-500 leading-relaxed mb-10 font-normal">
                    {{ $wallpaper->description ?? 'This high-resolution image is available for your project. Perfect for your desktop or mobile background.' }}
                </p>

                <div class="flex flex-col gap-3 mb-12">
                    <a href="{{ $wallpaper->image_url }}" target="_blank" download class="flex items-center justify-center gap-2 w-full bg-white text-black py-3 rounded-sm text-[13px] font-semibold hover:opacity-90 transition-opacity">
                        Download Image
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                    </a>
                    <button class="flex items-center justify-center gap-2 w-full bg-[#18181a] border border-white/[0.05] text-white py-3 rounded-sm text-[13px] font-semibold hover:bg-white/[0.03] transition-colors">
                        Add to Collection
                    </button>
                </div>

                <div class="border-t border-white/[0.05] pt-10 grid grid-cols-2 gap-y-8">
                    <div>
                        <p class="text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-1.5">Category</p>
                        <p class="text-[13px] text-gray-300 font-medium">{{ $wallpaper->category }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-1.5">Resolution</p>
                        <p class="text-[13px] text-gray-300 font-medium">{{ $wallpaper->resolution ?? 'Original' }}</p>
                    </div>
                    @if($wallpaper->tags)
                        <div class="col-span-2">
                            <p class="text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-3">Tags</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $wallpaper->tags) as $tag)
                                    <span class="px-3 py-1 bg-white/[0.03] border border-white/[0.05] text-[12px] text-gray-400 font-normal rounded-sm hover:text-white transition-colors cursor-default">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


