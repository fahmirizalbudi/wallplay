<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use App\Services\WallpaperService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class WallpaperController
 * 
 * Handles all web requests related to wallpaper management, including
 * discovery, categorization, and contribution.
 * 
 * @package App\Http\Controllers
 */
class WallpaperController extends Controller
{
    /**
     * @var WallpaperService
     */
    protected $wallpaperService;

    /**
     * WallpaperController constructor.
     * 
     * @param WallpaperService $wallpaperService
     */
    public function __construct(WallpaperService $wallpaperService)
    {
        $this->wallpaperService = $wallpaperService;
    }

    /**
     * Display the curated editorial feed.
     * 
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $wallpapers = $this->wallpaperService->getHomeWallpapers($request);
        return view('wallpapers.index', compact('wallpapers'));
    }

    /**
     * Display the trending wallpapers based on random or algorithmic order.
     * 
     * @param Request $request
     * @return View
     */
    public function trending(Request $request): View
    {
        $wallpapers = $this->wallpaperService->getTrendingWallpapers($request);
        return view('wallpapers.trending', compact('wallpapers'));
    }

    /**
     * Display the category index.
     * 
     * @return View
     */
    public function categories(): View
    {
        $categoryData = $this->wallpaperService->getCategories();
        return view('wallpapers.categories.index', compact('categoryData'));
    }

    /**
     * Display wallpapers filtered by a specific category.
     * 
     * @param string $category
     * @return View
     */
    public function category($category): View
    {
        $wallpapers = $this->wallpaperService->getWallpapersByCategory($category);
        return view('wallpapers.categories.show', compact('wallpapers', 'category'));
    }

    /**
     * Show the form for contributing a new artwork.
     * 
     * @return View
     */
    public function create(): View
    {
        return view('wallpapers.create');
    }

    /**
     * Store a newly created wallpaper in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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

    /**
     * Display the detailed view of a specific wallpaper.
     * 
     * @param Wallpaper $wallpaper
     * @return View
     */
    public function show(Wallpaper $wallpaper): View
    {
        return view('wallpapers.show', compact('wallpaper'));
    }
}


