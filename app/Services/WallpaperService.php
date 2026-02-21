<?php

namespace App\Services;

use App\Models\Wallpaper;
use App\Repositories\Interfaces\WallpaperRepositoryInterface;
use Illuminate\Http\Request;

class WallpaperService
{
    protected $wallpaperRepository;

    public function __construct(WallpaperRepositoryInterface $wallpaperRepository)
    {
        $this->wallpaperRepository = $wallpaperRepository;
    }

    public function getHomeWallpapers(Request $request)
    {
        return $this->wallpaperRepository->getPaginatedWallpapers($request);
    }

    public function getTrendingWallpapers(Request $request)
    {
        return $this->wallpaperRepository->getRandomPaginatedWallpapers($request);
    }

    public function getCategories()
    {
        $categories = $this->wallpaperRepository->getAllUniqueCategories();
        
        return $categories->map(function($category) {
            return (object) [
                'name' => $category,
                'image' => Wallpaper::where('category', $category)->first()->image_url ?? '',
                'count' => Wallpaper::where('category', $category)->count()
            ];
        });
    }

    public function getWallpapersByCategory(string $category)
    {
        return $this->wallpaperRepository->getCategoryWallpapers($category);
    }

    public function storeWallpaper(array $data)
    {
        return $this->wallpaperRepository->create($data);
    }
}


