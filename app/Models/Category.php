<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use HasSlug;

    protected $fillable = ['name', 'description', 'menu_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        $menuSlug = $this->menu->slug ?? '';
        return SlugOptions::create()
            ->generateSlugsFrom([$menuSlug, 'name'])
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
