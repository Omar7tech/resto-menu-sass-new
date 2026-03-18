<div class="category-swiper-wrapper relative {{ $menu->is_category_bar_sticky ? 'sticky top-16 z-20 backdrop-blur-xl' : '' }}" style="{{ $menu->is_category_bar_sticky ? 'background-color: rgb(var(--bg-primary) / 0.8);' : '' }}">
  <!-- Left fade indicator - always visible with subtle opacity -->
  <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-16 bg-linear-to-r from-[rgb(var(--bg-primary))] via-[rgb(var(--bg-primary)_0.5)] to-transparent z-10 opacity-50"></div>
  
  <!-- Right fade indicator - always visible with subtle opacity -->
  <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-16 bg-linear-to-l from-[rgb(var(--bg-primary))] via-[rgb(var(--bg-primary)_0.5)] to-transparent z-10 opacity-50"></div>
  
  <div class="swiper category-swiper">
    <div class="swiper-wrapper">
      @foreach ($menu->categories as $category)
        <div class="swiper-slide">
          <x-menu.categories.bar-badge :name="$category->name" />
        </div>
      @endforeach
    </div>
  </div>
</div>