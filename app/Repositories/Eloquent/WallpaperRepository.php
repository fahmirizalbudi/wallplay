<?php

namespace App\Repositories\Eloquent;

use App\Models\Wallpaper;
use App\Repositories\Interfaces\WallpaperRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class WallpaperRepository
 * 
 * Implements data access logic using Eloquent for the Wallpaper model.
 * 
 * @package App\Repositories\Eloquent
 */
class WallpaperRepository implements WallpaperRepositoryInterface
{
    /**
     * @param Request $request
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedWallpapers(Request $request, int $perPage = 12): LengthAwarePaginator
    {
        $query = Wallpaper::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->has('category') && $request->get('category') !== 'All') {
            $query->where('category', $request->get('category'));
        }

        return $query->latest()->paginate($perPage)->withQueryString();
    }

    /**
     * @param Request $request
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getRandomPaginatedWallpapers(Request $request, int $perPage = 12): LengthAwarePaginator
    {
        $query = Wallpaper::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        return $query->inRandomOrder()->paginate($perPage)->withQueryString();
    }

    /**
     * @return Collection
     */
    public function getAllUniqueCategories(): Collection
    {
        return Wallpaper::select('category')->distinct()->get()->pluck('category');
    }

    /**
     * @param string $category
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getCategoryWallpapers(string $category, int $perPage = 12): LengthAwarePaginator
    {
        return Wallpaper::where('category', $category)->latest()->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Wallpaper
     */
    public function create(array $data): Wallpaper
    {
        return Wallpaper::create($data);
    }
}


