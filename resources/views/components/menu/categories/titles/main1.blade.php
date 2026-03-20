@props(["name" => null, "index" => null, "description" => null])
<h1 class="p-4 sm:p-6 {{ $menu->is_category_title_bold ? 'font-bold' : 'font-light' }} {{ $menu->is_category_title_custom_font && $menu->have_customized_font ? '' : 'font-poppins' }} {{ $menu->category_title_custom_color ? '' : 'text-primary-color dark:text-primary-color' }} wrap-break-word text-[clamp(2.5rem,6vw,4rem)]" @if($menu->category_title_custom_color && $menu->category_title_color) style="color: {{ $menu->category_title_color }}" @endif>
  <div class="{{ $menu->is_category_title_centered ? 'flex items-start justify-center gap-2' : 'flex items-start gap-2' }}">
    <span class="line-clamp-2 {{ $menu->capitalize_category_names ? 'uppercase' : '' }}">{{ $name }}</span>
    @if($menu->show_category_index && $index)
      <span class="text-gray-600 text-[clamp(1rem,1.5vw,2rem)] mt-1">{{ str_pad($index, 2, '0', STR_PAD_LEFT) }}</span>
    @endif
  </div>
  @if($menu->show_category_descriptions && $description)
    <p class="mt-2 text-sm text-gray-500 font-normal {{ $menu->is_category_title_centered ? 'text-center' : '' }} {{ $menu->is_category_title_custom_font && $menu->have_customized_font ? '' : 'font-poppins' }}">
      {{ $description }}
    </p>
  @endif
</h1>