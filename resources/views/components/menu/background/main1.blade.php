@props(['menu' => null])

{{-- 
CONDITIONS FOR BACKGROUND DISPLAY:
1. Menu must exist
2. has_custom_background must be true
3. Background image must exist (either uploaded or external URL)
--}}

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
            <div class="absolute inset-0 bg-black/20"></div>
        </div>
    @endif
@endif
