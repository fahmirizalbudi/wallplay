<?php

namespace App\Providers;

use App\Repositories\Eloquent\WallpaperRepository;
use App\Repositories\Interfaces\WallpaperRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        $this->app->bind(WallpaperRepositoryInterface::class, WallpaperRepository::class);
    }

    public function boot(): void
    {
        
    }
}


