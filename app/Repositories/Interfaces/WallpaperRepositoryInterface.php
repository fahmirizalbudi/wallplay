<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Wallpaper;

/**
 * Interface WallpaperRepositoryInterface
 * 
 * Defines the contract for wallpaper data access operations.
 * 
 * @package App\Repositories\Interfaces
 */
interface WallpaperRepositoryInterface
{
    /**
     * @param Request $request
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedWallpapers(Request $request, int $perPage = 12): LengthAwarePaginator;

    /**
     * @param Request $request
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getRandomPaginatedWallpapers(Request $request, int $perPage = 12): LengthAwarePaginator;

    /**
     * @return Collection
     */
    public function getAllUniqueCategories(): Collection;

    /**
     * @param string $category
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getCategoryWallpapers(string $category, int $perPage = 12): LengthAwarePaginator;

    /**
     * @param array $data
     * @return Wallpaper
     */
    public function create(array $data): Wallpaper;
}


