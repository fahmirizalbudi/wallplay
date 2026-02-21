<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use App\Services\WallpaperService;
use Illuminate\Http\Request;

class WallpaperController extends Controller
{
    protected $wallpaperService;

    public function __construct(WallpaperService $wallpaperService)
    {
        $this->wallpaperService = $wallpaperService;
    }

    public function index(Request $request)
    {
        $wallpapers = $this->wallpaperService->getHomeWallpapers($request);
        return view('wallpapers.index', compact('wallpapers'));
    }

    public function trending(Request $request)
    {
        $wallpapers = $this->wallpaperService->getTrendingWallpapers($request);
        return view('wallpapers.trending', compact('wallpapers'));
    }

    public function categories()
    {
        $categoryData = $this->wallpaperService->getCategories();
        return view('wallpapers.categories.index', compact('categoryData'));
    }

    public function category($category)
    {
        $wallpapers = $this->wallpaperService->getWallpapersByCategory($category);
        return view('wallpapers.categories.show', compact('wallpapers', 'category'));
    }

    public function create()
    {
        return view('wallpapers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'category' => 'required|string',
            'tags' => 'nullable|string',
            'resolution' => 'nullable|string',
        ]);

        $this->wallpaperService->storeWallpaper($validated);

        return redirect()->route('home')->with('success', 'Wallpaper added successfully!');
    }

    public function show(Wallpaper $wallpaper)
    {
        return view('wallpapers.show', compact('wallpaper'));
    }
}


