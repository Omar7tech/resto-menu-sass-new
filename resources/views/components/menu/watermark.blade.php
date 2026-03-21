<div class="flex flex-col items-center py-6 text-sm text-gray-400 font-poppins bg-[rgb(var(--bg-primary))]">
    <div class="flex items-center space-x-2 mb-3">
        @if($menu && $menu->dark_mode)
            <img src="{{ asset('logos/logo-on-dark.png') }}" alt="Menu Engine Logo" class="h-5 w-auto opacity-80">
        @else
            <img src="{{ asset('logos/logo-on-light.png') }}" alt="Menu Engine Logo" class="h-5 w-auto opacity-80">
        @endif
        <span class="font-medium">powered by Menu Engine</span>
    </div>
</div>
