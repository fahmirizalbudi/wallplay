<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallpaper
 * 
 * Represents a wallpaper entity in the system.
 * 
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $image_url
 * @property string $category
 * @property string|null $tags
 * @property string|null $resolution
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @package App\Models
 */
class Wallpaper extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'category',
        'tags',
        'resolution',
    ];
}


