<div class="category-swiper-wrapper relative {{ $menu->is_category_bar_sticky ? 'sticky top-16 z-20' : '' }}" 
     @if($menu->is_category_bar_sticky)
       @if(!$menu->has_custom_background)
         style="background-color: rgb(var(--bg-primary) / 0.8);"
       @endif
     @endif>
  <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-16 bg-linear-to-r from-[rgb(var(--bg-primary))] via-[rgb(var(--bg-primary)_0.5)] to-transparent z-10 opacity-50"></div>
  <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-16 bg-linear-to-l from-[rgb(var(--bg-primary))] via-[rgb(var(--bg-primary)_0.5)] to-transparent z-10 opacity-50"></div>
  <div class="swiper category-swiper">
    <div class="swiper-wrapper">
      @foreach ($menu->categories as $category)
        <div class="swiper-slide">
          <x-menu.categories.bar-badge :category="$category" />
        </div>
      @endforeach
    </div>
  </div>
</div>