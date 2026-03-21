@if(!$menu->is_logo_typography && $menu->getMedia('logo')->first())
    <div class="w-full py-12 md:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <img src="{{ $menu->getFirstMediaUrl('logo', 'logo') }}" alt="{{ $menu->name }} Logo"
                    class="h-auto max-w-full object-contain" style="max-height: 200px;" loading="eager" />
            </div>
        </div>
    </div>
@endif