@props(['category'])
<a href="#category-{{ $category->slug }}"
  class="category-badge my-1 {{ $menu->is_category_badge_follow_primary_color ? 'primary-color-bg primary-color-text' : 'category-badge-custom-color' }} text-xs font-medium tracking-[0.08em] {{ $menu->uppercase_all_category_badges ? 'uppercase' : '' }} px-6 py-3 {{ $menu->is_category_badge_rounded_full ? 'rounded-full' : 'rounded-lg' }} {{ $menu->category_badge_show_border ? 'border-0' : '' }} transition-all duration-300 cursor-pointer relative group lg:hover:scale-[1.02] lg:hover:-translate-y-px">
  <span class="relative z-10">{{ $category->name }}</span>
  <div
    class="absolute inset-0 bg-linear-to-br from-white/8 via-transparent to-transparent opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300 {{ $menu->is_category_badge_rounded_full ? 'rounded-full' : 'rounded-lg' }}">
  </div>
</a>