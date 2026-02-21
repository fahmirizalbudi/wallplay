@extends('layouts.app')

@section('title', 'Browse Collections | WallPlay Wallpaper Directory')
@section('description', 'Explore our systematically organized index of visual archives. Browse wallpapers by category, aesthetic, and theme.')

@section('content')
<!-- Minimal Header -->
<header class="max-w-4xl mx-auto px-6 pt-24 pb-16">
    <div class="max-w-xl">
        <h1 class="text-3xl font-semibold text-white tracking-tight mb-4">Collections.</h1>
        <p class="text-[14px] text-gray-500 font-normal leading-relaxed">
            A refined directory of our visual archives. Select a collection 
            to explore its high-fidelity ecosystem.
        </p>
    </div>
</header>

<!-- Precision Architectural List (V2) -->
<section class="max-w-4xl mx-auto px-6 mb-32">
    <div class="flex flex-col border-t border-white/10">
        @forelse($categoryData as $index => $cat)
            <a href="{{ route('wallpapers.category', $cat->name) }}" 
               class="group relative flex items-center py-10 border-b border-white/[0.05] transition-all duration-300 hover:bg-white/[0.02] px-6 -mx-6">
                
                <!-- 1. The Anchor (Status Bar revealed on hover) -->
                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-0 bg-indigo-500 transition-all duration-300 group-hover:h-10 rounded-full"></div>

                <div class="flex items-center w-full">
                    <!-- 2. Bold Proportional Index (Fixed Width) -->
                    <div class="w-16 shrink-0">
                        <span class="text-[19px] font-semibold text-gray-700 group-hover:text-indigo-500 transition-colors tracking-tighter tabular-nums">
                            {{ sprintf('%02d', $index + 1) }}
                        </span>
                    </div>

                    <!-- 3. Balanced Category Name (Primary) -->
                    <div class="flex-grow">
                        <h2 class="text-2xl font-semibold text-gray-400 group-hover:text-white transition-colors tracking-tight">
                            {{ $cat->name }}
                        </h2>
                    </div>

                    <!-- 4. Proportional Data Section (Increased & Tightened) -->
                    <div class="flex items-center gap-10 shrink-0">
                        <div class="flex flex-col items-end">
                            <span class="text-[22px] font-semibold text-white leading-none tracking-tighter">{{ $cat->count }}</span>
                            <span class="text-[12px] font-medium text-gray-500 mt-1.5 tracking-tight">Items</span>
                        </div>
                        
                        <!-- Small Minimal Arrow -->
                        <div class="text-gray-800 group-hover:text-indigo-400 transition-all duration-500 transform group-hover:translate-x-1">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="py-20 text-center">
                <p class="text-gray-600 text-[14px]">Archives are empty.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection

