<div class="group flex flex-col">
    <a href="{{ route('wallpapers.show', $wallpaper) }}" class="relative block aspect-[4/3] bg-[#18181a] rounded-sm overflow-hidden border border-white/[0.05]">
        <img src="{{ $wallpaper->image_url }}" 
             alt="{{ $wallpaper->title }}" 
             class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-90">
        
        @if(isset($badge))
            <div class="absolute top-3 left-3">
                <div class="flex items-center gap-1.5 px-2.5 py-1 bg-black/40 backdrop-blur-md border border-white/10 rounded-sm">
                    <span class="w-1 h-1 rounded-full bg-indigo-500 animate-pulse"></span>
                    <span class="text-[9px] font-medium text-gray-200 uppercase tracking-wider">
                        {{ $badge }}
                    </span>
                </div>
            </div>
        @endif

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


