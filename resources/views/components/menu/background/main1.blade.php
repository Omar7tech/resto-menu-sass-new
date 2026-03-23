
@if($menu && $menu->has_custom_background)
    @php
        $bgImageUrl = $menu->background_source === 'external'
            ? $menu->background_image_url
            : ($menu->getFirstMediaUrl('background') ?: null);
    @endphp
    @if($bgImageUrl)
        <div class="fixed inset-0 -z-10">
            <img
                src="{{ $bgImageUrl }}"
                alt="Background"
                class="w-full h-full object-cover"
            />
            {{-- Lighter overlay for better visibility --}}
            <div class="absolute inset-0" style="background-color: rgb(var(--bg-primary) / 0.95);"></div>
        </div>
    @endif
@endif
