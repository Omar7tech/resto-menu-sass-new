<div>
    <x-menu.categories.bar />
    <div class="px-5 mt-10">

        @foreach ($menu->categories as $category)
            <div @if($menu->enable_category_animations) data-aos="{{ $menu->category_animation_type }}" @endif id="category-{{ $category->slug }}" class="category-section" style="scroll-margin-top: 180px;">
                <x-menu.categories.titles.main1 :name="$category->name" :index="$loop->index + 1" />
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 pt-0">
                    <x-menu.products.card1 />
                    <x-menu.products.card1 />
                    <x-menu.products.card1 />
                </div>
            </div>
        @endforeach
    </div>
</div>