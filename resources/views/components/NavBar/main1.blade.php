<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <!-- Logo/Brand -->
                <div>
                    <a href="#" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">{{ $menu?->name ?? 'Restaurant Menu' }}</span>
                    </a>
                </div>

                <!-- Primary Navigation -->
                <div class="hidden md:flex items-center space-x-1">
                    @if($menu && $menu->categories->count() > 0)
                        @foreach($menu->categories as $category)
                            <a href="#{{ $category->slug }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class="w-6 h-6 text-gray-500 hover:text-green-500"
                         fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden mobile-menu md:hidden">
            @if($menu && $menu->categories->count() > 0)
                @foreach($menu->categories as $category)
                    <a href="#{{ $category->slug }}" class="block py-2 px-4 text-sm hover:bg-green-500 hover:text-white transition duration-300">
                        {{ $category->name }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</nav>