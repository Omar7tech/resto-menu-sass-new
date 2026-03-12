<nav class="fixed top-0 w-full z-50 backdrop-blur-xl border-b border-primary/20" x-data="{ open: false }" style="background-color: rgb(var(--bg-primary) / 0.8);">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

      <!-- Cart + Mobile Menu -->
      <div class="flex items-center space-x-4">
        <!-- Shopping Bag -->
        <a href="/cart" class="relative p-2 text-primary hover:text-primary transition-colors">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="none">
            <path d="M18 16H8a1 1 0 0 1-.958-.713L4.256 6H3a1 1 0 0 1 0-2h2a1 1 0 0 1 .958.713L6.344 6H21a1 1 0 0 1 .937 1.352l-3 8A1 1 0 0 1 18 16zm-9.256-2h8.563l2.25-6H6.944z" />
            <circle cx="16.5" cy="18.5" r="1.5" class="fill-current" />
            <circle cx="9.5" cy="18.5" r="1.5" class="fill-current" />
          </svg>
          <span class="absolute -top-2 -right-2 primary-color-bg text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center primary-color-text">3</span>
        </a>

        <!-- Mobile Menu Button -->
        <button 
          @click="open = !open"
          class="lg:hidden p-2 text-primary/80 hover:text-primary transition-colors">
          <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div 
      x-show="open" 
      x-transition
      class="lg:hidden border-t">
      <div class="px-4 py-4 space-y-3">
        <x-NavBar.mobileLink href="/menu" text="Menu" open="open" />
        <x-NavBar.mobileLink href="/about" text="About Us" open="open" />
        <x-NavBar.mobileLink href="/contact" text="Contact" open="open" />
      </div>
    </div>
  </div>
</nav>