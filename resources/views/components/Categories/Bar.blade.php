<div class="category-scroll-container" x-data="{ 
  isDown: false,
  startX: 0,
  scrollLeft: 0,
  isDragging: false
}" 
@mousedown="isDown = true; startX = $event.pageX - $el.offsetLeft; scrollLeft = $el.scrollLeft; $el.classList.add('cursor-grabbing');"
@mouseleave="isDown = false; $el.classList.remove('cursor-grabbing');"
@mouseup="isDown = false; $el.classList.remove('cursor-grabbing');"
@mousemove="if (!isDown) return; $event.preventDefault(); const x = $event.pageX - $el.offsetLeft; const walk = (x - startX) * 2; $el.scrollLeft = scrollLeft - walk;">
  <div class="flex gap-3 py-4 px-4 scroll-smooth cursor-grab">
    @foreach ($menu->categories as $category)
      <x-categories.bar-badge :name="$category->name" />
    @endforeach
  </div>
</div>
