<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface WallpaperRepositoryInterface
{
    public function getPaginatedWallpapers(Request $request, int $perPage = 12);
    public function getRandomPaginatedWallpapers(Request $request, int $perPage = 12);
    public function getAllUniqueCategories();
    public function getCategoryWallpapers(string $category, int $perPage = 12);
    public function create(array $data);
}

