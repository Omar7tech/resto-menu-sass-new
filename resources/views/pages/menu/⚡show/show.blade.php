<div>
    <x-menu.categories.bar />
    <div class="px-5 mt-10">

        @foreach ($menu->categories as $category)
            <div id="category-{{ $category->slug }}" class="category-section" style="scroll-margin-top: 180px;">
                <h1 class="text-3xl p-6 font-bold">
                    {{ $category->name }}
                </h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    <x-menu.products.card1 />
                    <x-menu.products.card1 />
                    <x-menu.products.card1 />
                </div>
            </div>
        @endforeach
    </div>
</div>