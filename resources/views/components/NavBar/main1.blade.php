<nav class="fixed top-0 w-full z-50 backdrop-blur-xl" x-data="{ open: false }" @click.away="open = false"
  style="background-color: rgb(var(--bg-primary) / 0.8);">
  <div class="max-w-[1500px] mx-auto px-4 sm:px-5 lg:px-6">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <a href="/" class="flex items-center space-x-3 group p-1 rounded-xl transition-all duration-300">
        @if($menu->getFirstMedia('logo'))
          <img src="{{ $menu->getFirstMediaUrl('logo') }}" alt="{{ $menu->name }}" class="h-8 w-auto object-contain">
        @else
          <span class="font-bold text-xl text-primary hidden lg:inline">
            {{ $menu->name }}
          </span>
        @endif
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center space-x-8">
        <x-NavBar.desktopLink href="/menu" text="Menu" />
        <x-NavBar.desktopLink href="/about" text="About Us" />
        <x-NavBar.desktopLink href="/contact" text="Contact" />
      </div>

      <!-- Cart + Auth Button + Mobile Menu -->
      <div class="flex items-center space-x-4">
        <!-- Auth Button -->
        @auth
          <a href="{{ auth()->user()->role === App\Enums\UserRole::CLIENT->value ? route('filament.admin.pages.dashboard') : route('filament.admin.pages.dashboard') }}"
            class="auth-btn inline-flex items-center space-x-2 px-3 py-2 primary-color-bg primary-color-text rounded-lg transition-all duration-300">
            <span
              class="text-sm font-medium">{{ auth()->user()->role === App\Enums\UserRole::CLIENT->value ? 'Dashboard' : 'Admin' }}</span>
          </a>
        @endauth

        <!-- Shopping Bag -->
        <a href="/cart" class="relative p-2 text-primary hover:text-primary transition-colors">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" stroke="none">
            <path
              d="M18 16H8a1 1 0 0 1-.958-.713L4.256 6H3a1 1 0 0 1 0-2h2a1 1 0 0 1 .958.713L6.344 6H21a1 1 0 0 1 .937 1.352l-3 8A1 1 0 0 1 18 16zm-9.256-2h8.563l2.25-6H6.944z" />
            <circle cx="16.5" cy="18.5" r="1.5" class="fill-current" />
            <circle cx="9.5" cy="18.5" r="1.5" class="fill-current" />
          </svg>
          <span
            class="absolute -top-1 -right-1 primary-color-bg text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center primary-color-text">3</span>
        </a>

        <!-- Mobile Menu Button -->
        <button @click="open = !open"
          class="lg:hidden p-2 text-primary/80 hover:text-primary transition-colors relative w-6 h-6">
          <svg class="w-6 h-6 absolute inset-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <!-- Top line -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16"
              :style="open ? 'transform: translateY(6px) rotate(45deg); transform-origin: center;' : ''"
              class="transition-all duration-300 ease-in-out">
            </path>
            <!-- Middle line -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16"
              :class="open ? 'opacity-0' : 'opacity-100'" class="transition-all duration-300 ease-in-out">
            </path>
            <!-- Bottom line -->
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 18h16"
              :style="open ? 'transform: translateY(-6px) rotate(-45deg); transform-origin: center;' : ''"
              class="transition-all duration-300 ease-in-out">
            </path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="lg:hidden border-t">
      <div class="px-4 py-4 space-y-3">
        <x-NavBar.mobileLink href="/menu" text="Menu" open="open" />
        <x-NavBar.mobileLink href="/about" text="About Us" open="open" />
        <x-NavBar.mobileLink href="/contact" text="Contact" open="open" />
      </div>
    </div>
  </div>
</nav>