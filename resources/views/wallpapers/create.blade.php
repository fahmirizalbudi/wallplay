{{--
|--------------------------------------------------------------------------
| Contribution Form View
|--------------------------------------------------------------------------
|
| Provides the interface for users to submit new artworks to the archive.
| Handles server-side validation errors and category selection.
|
--}}
@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-6 pt-16 pb-24">
    <div class="mb-12">
        <h1 class="text-3xl font-semibold text-white tracking-tight mb-3">Contribute a masterpiece.</h1>
        <p class="text-[15px] text-gray-500 font-normal leading-relaxed">
            Share your high-quality visuals with the community. Please ensure images are high-resolution and follow our quality guidelines.
        </p>
    </div>

    <form action="{{ route('wallpapers.store') }}" method="POST" class="space-y-10">
        @csrf

        <div class="space-y-6">
            <div class="group">
                <label for="title" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Artwork Title</label>
                <input type="text" name="title" id="title" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white placeholder-gray-700 focus:border-white/20 focus:ring-0 transition-colors" placeholder="e.g. Concrete Geometry" value="{{ old('title') }}" required>
                @error('title') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
            </div>

            <div class="group">
                <label for="image_url" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Direct Image Link (URL)</label>
                <input type="url" name="image_url" id="image_url" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white placeholder-gray-700 focus:border-white/20 focus:ring-0 transition-colors" placeholder="https://images.unsplash.com/photo-..." value="{{ old('image_url') }}" required>
                @error('image_url') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="group">
                    <label for="category" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Category</label>
                    <div class="relative">
                        <select name="category" id="category" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white focus:border-white/20 focus:ring-0 transition-colors appearance-none" required>
                            <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select a category</option>
                            <option value="Nature" {{ old('category') == 'Nature' ? 'selected' : '' }}>Nature</option>
                            <option value="Architecture" {{ old('category') == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                            <option value="Abstract" {{ old('category') == 'Abstract' ? 'selected' : '' }}>Abstract</option>
                            <option value="Minimal" {{ old('category') == 'Minimal' ? 'selected' : '' }}>Minimal</option>
                            <option value="Space" {{ old('category') == 'Space' ? 'selected' : '' }}>Space</option>
                        </select>
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2.5"/></svg>
                        </div>
                    </div>
                    @error('category') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
                </div>

                <div class="group">
                    <label for="resolution" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Resolution</label>
                    <input type="text" name="resolution" id="resolution" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white placeholder-gray-700 focus:border-white/20 focus:ring-0 transition-colors" placeholder="e.g. 3840x2160" value="{{ old('resolution') }}">
                    @error('resolution') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="group">
                <label for="tags" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Tags</label>
                <input type="text" name="tags" id="tags" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white placeholder-gray-700 focus:border-white/20 focus:ring-0 transition-colors" placeholder="Separate with commas (e.g. blue, dark, minimal)" value="{{ old('tags') }}">
                @error('tags') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
            </div>

            <div class="group">
                <label for="description" class="block text-[11px] text-gray-600 font-semibold uppercase tracking-tight mb-2 group-focus-within:text-white transition-colors">Short Narrative</label>
                <textarea name="description" id="description" rows="4" class="w-full bg-[#18181a] border border-white/[0.05] rounded-sm px-4 py-3 text-[14px] text-white placeholder-gray-700 focus:border-white/20 focus:ring-0 transition-colors resize-none" placeholder="Tell us something about this artwork...">{{ old('description') }}</textarea>
                @error('description') <p class="mt-2 text-[12px] text-red-500/80">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center justify-between pt-10 border-t border-white/[0.05]">
            <a href="{{ route('home') }}" class="text-[13px] font-medium text-gray-500 hover:text-white transition-colors">Discard changes</a>
            <button type="submit" class="flex items-center gap-4 bg-white text-black pl-10 pr-6 py-3 rounded-sm text-[13px] font-semibold hover:opacity-90 transition-opacity">
                Publish Artwork
                <span class="w-6 h-6 flex items-center justify-center bg-black/5 rounded-full">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </span>
            </button>
        </div>
    </form>
</div>
@endsection


