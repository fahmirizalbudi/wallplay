<?php

namespace Database\Seeders;

use App\Models\Wallpaper;
use Illuminate\Database\Seeder;

class WallpaperSeeder extends Seeder
{
    
    public function run(): void
    {
        
        Wallpaper::truncate();

        $wallpapers = [
            [
                'title' => 'Concrete Geometry',
                'description' => 'Minimalist architectural lines in brutalist style.',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Architecture',
                'tags' => 'minimal, building, gray',
                'resolution' => '5400x3600',
            ],
            [
                'title' => 'Silent Peak',
                'description' => 'A lone mountain peak shrouded in morning mist.',
                'image_url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Nature',
                'tags' => 'mountain, snow, blue',
                'resolution' => '6000x4000',
            ],
            [
                'title' => 'Desert Isolation',
                'description' => 'Rolling sand dunes under a soft pastel sky.',
                'image_url' => 'https://images.unsplash.com/photo-1473580044384-7ba9967e16a0?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Nature',
                'tags' => 'desert, sand, warm',
                'resolution' => '4500x3000',
            ],
            [
                'title' => 'Monochrome Forest',
                'description' => 'Ethereal forest captured in high-contrast black and white.',
                'image_url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Nature',
                'tags' => 'forest, trees, bw',
                'resolution' => '5184x3456',
            ],
            [
                'title' => 'Abstract Glass',
                'description' => 'Reflections and light play on a modern skyscraper.',
                'image_url' => 'https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Abstract',
                'tags' => 'glass, light, modern',
                'resolution' => '4000x6000',
            ],
            [
                'title' => 'Arctic Silence',
                'description' => 'Floating ice in the deep blue waters of the north.',
                'image_url' => 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Nature',
                'tags' => 'ice, water, arctic',
                'resolution' => '3000x2000',
            ],
            [
                'title' => 'Urban Symmetry',
                'description' => 'Perfectly aligned windows of a contemporary apartment.',
                'image_url' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Architecture',
                'tags' => 'city, pattern, minimal',
                'resolution' => '3500x4500',
            ],
            [
                'title' => 'Nebula Dust',
                'description' => 'Deep space colors and cosmic clouds.',
                'image_url' => 'https://images.unsplash.com/photo-1464802686167-b939a67e06a1?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Space',
                'tags' => 'galaxy, stars, violet',
                'resolution' => '7680x4320',
            ],
            [
                'title' => 'Zen Rocks',
                'description' => 'Stacked stones by a peaceful lake shore.',
                'image_url' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?q=80&w=1200&auto=format&fit=crop',
                'category' => 'Minimal',
                'tags' => 'zen, stone, water',
                'resolution' => '4000x2667',
            ],
        ];

        foreach ($wallpapers as $wallpaper) {
            Wallpaper::create($wallpaper);
        }
    }
}


