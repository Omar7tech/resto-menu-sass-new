@props(['name' => 'test'])
<div class="category-badge {{ $menu->is_category_badge_follow_primary_color ? 'primary-color-bg' : '' }} text-lg font-medium {{ $menu->is_category_badge_follow_primary_color ? 'primary-color-text' : '' }} {{ $menu->uppercase_all_category_badges ? 'uppercase' : '' }} px-4 py-2 {{ $menu->is_category_badge_rounded_full ? 'rounded-full' : 'rounded-sm' }} border transition-all duration-300 hover:scale-102 hover:shadow-xs cursor-pointer overflow-visible" 
@if(!$menu->is_category_badge_follow_primary_color)
  style="background-color: {{ $menu->category_badge_color }}; color: {{ $menu->category_badge_color ? (new \App\Helpers\ColorHelper($menu->category_badge_color))->getContrastColor() : '#FFFFFF' }};"
@endif
>
  {{ $name }}
</div>