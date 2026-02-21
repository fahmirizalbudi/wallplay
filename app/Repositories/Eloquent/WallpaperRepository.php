<?php

namespace App\Repositories\Eloquent;

use App\Models\Wallpaper;
use App\Repositories\Interfaces\WallpaperRepositoryInterface;
use Illuminate\Http\Request;

class WallpaperRepository implements WallpaperRepositoryInterface
{
    public function getPaginatedWallpapers(Request $request, int $perPage = 12)
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

    public function getRandomPaginatedWallpapers(Request $request, int $perPage = 12)
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

    public function getAllUniqueCategories()
    {
        return Wallpaper::select('category')->distinct()->get()->pluck('category');
    }

    public function getCategoryWallpapers(string $category, int $perPage = 12)
    {
        return Wallpaper::where('category', $category)->latest()->paginate($perPage);
    }

    public function create(array $data)
    {
        return Wallpaper::create($data);
    }
}


