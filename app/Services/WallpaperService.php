<?php

namespace App\Services;

use App\Models\Wallpaper;
use App\Repositories\Interfaces\WallpaperRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class WallpaperService
 * 
 * Orchestrates business logic for wallpaper operations, bridging the gap
 * between controllers and data repositories.
 * 
 * @package App\Services
 */
class WallpaperService
{
    /**
     * @var WallpaperRepositoryInterface
     */
    protected $wallpaperRepository;

    /**
     * WallpaperService constructor.
     * 
     * @param WallpaperRepositoryInterface $wallpaperRepository
     */
    public function __construct(WallpaperRepositoryInterface $wallpaperRepository)
    {
        $this->wallpaperRepository = $wallpaperRepository;
    }

    /**
     * Retrieve paginated wallpapers for the home feed.
     * 
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getHomeWallpapers(Request $request): LengthAwarePaginator
    {
        return $this->wallpaperRepository->getPaginatedWallpapers($request);
    }

    /**
     * Retrieve paginated wallpapers for the trending feed.
     * 
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getTrendingWallpapers(Request $request): LengthAwarePaginator
    {
        return $this->wallpaperRepository->getRandomPaginatedWallpapers($request);
    }

    /**
     * Retrieve a mapped collection of all unique categories with their metadata.
     * 
     * @return Collection
     */
    public function getCategories(): Collection
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

    /**
     * Retrieve paginated wallpapers for a specific category.
     * 
     * @param string $category
     * @return LengthAwarePaginator
     */
    public function getWallpapersByCategory(string $category): LengthAwarePaginator
    {
        return $this->wallpaperRepository->getCategoryWallpapers($category);
    }

    /**
     * Validate and store a new wallpaper contribution.
     * 
     * @param array $data
     * @return Wallpaper
     */
    public function storeWallpaper(array $data): Wallpaper
    {
        return $this->wallpaperRepository->create($data);
    }
}


