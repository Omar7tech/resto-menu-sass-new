@props(['size' => 'normal'])

<div class="flex items-center space-x-3">
  @if($menu)
    @if($menu->is_logo_typography)
      <span class="font-bold {{ $size === 'large' ? 'text-2xl' : 'text-xl' }} {{ $menu->typography_logo_follow_primary_color ? 'primary-color-text' : 'text-primary' }}" 
            @if($menu->typography_logo_follow_primary_color) 
              style="color: {{ $menu->primary_color ?? '#652FF5' }};" 
            @endif>
        {{ $menu->name }}
      </span>
    @else
      @if($menu->getFirstMedia('logo'))
        <img src="{{ $menu->getFirstMediaUrl('logo') }}" alt="{{ $menu->name }}" class="{{ $size === 'large' ? 'h-12' : 'h-8' }} w-auto object-contain {{ $size === 'large' ? 'max-w-[300px]' : 'max-w-[200px]' }}">
      @else
        <span class="font-bold {{ $size === 'large' ? 'text-2xl' : 'text-xl' }} {{ $menu->typography_logo_follow_primary_color ? 'primary-color-text' : 'text-primary' }}" 
              @if($menu->typography_logo_follow_primary_color) 
                style="color: {{ $menu->primary_color ?? '#652FF5' }};" 
              @endif>
          {{ $menu->name }}
        </span>
      @endif
    @endif
  @else
    <span class="font-bold {{ $size === 'large' ? 'text-2xl' : 'text-xl' }} text-primary">Menu Engine</span>
  @endif
</div>
