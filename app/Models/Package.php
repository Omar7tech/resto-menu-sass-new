<?php

namespace App\Models;

use App\Enums\PackageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Package extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'slug',
        'type',
        'is_active',
        'name',
        'description',
        'meta',
        'max_categories',
        'max_products',
        'can_add_images',
        'can_add_tags',
        'has_multi_branches',
        'max_branches',
        'can_add_to_cart',
        'can_have_social_media',
        'can_edit_theme',
        'remove_branding',
        'featured',
        'yearly_price',
        'discount_yearly_price',
        'sort',
        'setup_fees',
        'discount_setup_fees',
    ];

    protected $casts = [
        'type' => PackageType::class,
        'meta' => 'array',
        'can_add_images' => 'boolean',
        'can_add_tags' => 'boolean',
        'has_multi_branches' => 'boolean',
        'can_add_to_cart' => 'boolean',
        'can_have_social_media' => 'boolean',
        'can_edit_theme' => 'boolean',
        'remove_branding' => 'boolean',
        'featured' => 'boolean',
        'is_active' => 'boolean',
        'yearly_price' => 'decimal:2',
        'discount_yearly_price' => 'decimal:2',
        'setup_fees' => 'decimal:2',
        'discount_setup_fees' => 'decimal:2',
    ];



    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort')->orderBy('name');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
