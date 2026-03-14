<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menu extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasSlug;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'package_id',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'canonical_url',
        'robots_meta',
        'og_image_external_link',
        'is_og_image_external',
        'is_favicon_image_external',
        'favicon_external_link',
        'primary_color',
        'dark_mode',
        'have_customized_font',
        'is_category_badge_rounded_full',
        'uppercase_all_category_badges',
        'is_category_badge_follow_font',
        'is_category_badge_follow_primary_color',
        'category_badge_color',
        'is_logo_typography',
        'typography_logo_follow_primary_color',
        'font'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'meta_keywords' => 'array',
            'dark_mode' => 'boolean',
            'have_customized_font' => 'boolean',
            'is_category_badge_rounded_full' => 'boolean',
            'uppercase_all_category_badges' => 'boolean',
            'is_category_badge_follow_font' => 'boolean',
            'is_category_badge_follow_primary_color' => 'boolean',
            'is_logo_typography' => 'boolean',
            'typography_logo_follow_primary_color' => 'boolean',
            'category_badge_color' => 'string',
        ];
    }

    public function seoStatus(): bool
    {
        return !empty($this->meta_title) &&
            !empty($this->meta_description);

    }

    

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('og_image')
            ->performOnCollections('og_image')
            ->quality(50)
            ->format('jpg') 
            ->crop(1200, 630, CropPosition::Center)
            ->nonQueued();

            $this->addMediaConversion('favicon')
            ->performOnCollections('favicon')
            ->format('png')
            ->width(32)
            ->height(32)
            ->nonQueued();
    }


}
