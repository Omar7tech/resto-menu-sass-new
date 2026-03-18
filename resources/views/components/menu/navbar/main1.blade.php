<nav class="fixed top-0 w-full z-50 backdrop-blur-xl" 
     x-data="{ open: false }" 
     @keydown.escape.window="open = false"
     style="background-color: rgb(var(--bg-primary) / 0.8);">
  
  <div class="max-w-[1500px] mx-auto px-4 sm:px-5 lg:px-6">
    <div class="flex items-center justify-between h-16">
      
      <div class="flex items-center">
        <a href="/" class="flex items-center space-x-3 group p-1 rounded-xl transition-all duration-300">
          <x-menu.logo />
        </a>
      </div>

      <div class="hidden lg:flex items-center flex-1 justify-center">
        <div class="flex items-center space-x-8">
          <x-menu.navbar.desktopLink href="/menu" text="Menu" />
          <x-menu.navbar.desktopLink href="/about" text="About Us" />
          <x-menu.navbar.desktopLink href="/contact" text="Contact" />
        </div>
      </div>

      <div class="flex items-center space-x-4">
        @auth
          <a href="{{ auth()->user()->role === App\Enums\UserRole::CLIENT->value ? route('filament.admin.pages.dashboard') : route('filament.admin.pages.dashboard') }}"
            class="auth-btn inline-flex items-center space-x-2 px-3 py-2 primary-color-bg primary-color-text rounded-lg transition-all duration-300">
            <span class="text-sm font-medium">{{ auth()->user()->role === App\Enums\UserRole::CLIENT->value ? 'Dashboard' : 'Admin' }}</span>
          </a>
        @endauth

        <a href="/cart" class="relative p-2 text-primary hover:text-primary transition-colors">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M18 16H8a1 1 0 0 1-.958-.713L4.256 6H3a1 1 0 0 1 0-2h2a1 1 0 0 1 .958.713L6.344 6H21a1 1 0 0 1 .937 1.352l-3 8A1 1 0 0 1 18 16zm-9.256-2h8.563l2.25-6H6.944z" />
                <circle cx="16.5" cy="18.5" r="1.5" />
                <circle cx="9.5" cy="18.5" r="1.5" />
            </svg>
            <span class="absolute -top-1 -right-1 primary-color-bg text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center primary-color-text">3</span>
        </a>

        <button @click="open = !open" type="button" class="lg:hidden p-2 text-primary/80 focus:outline-none" aria-label="Toggle menu">
            <div class="w-6 h-5 relative flex flex-col justify-between overflow-hidden">
                <span :class="open ? 'translate-y-[9px] rotate-45' : ''" class="w-full h-[3px] primary-color-bg rounded-full transition-all duration-300 origin-center"></span>
                <span :class="open ? 'opacity-0 -translate-x-full' : ''" class="w-full h-[3px] primary-color-bg rounded-full transition-all duration-300"></span>
                <span :class="open ? '-translate-y-[9px] -rotate-45' : ''" class="w-full h-[3px] primary-color-bg rounded-full transition-all duration-300 origin-center"></span>
            </div>
        </button>
      </div>
    </div>

    <div x-show="open" 
         x-cloak 
         @click.away="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden border-t py-4 space-y-3">
        <x-menu.navbar.mobileLink href="/menu" text="Menu" />
        <x-menu.navbar.mobileLink href="/about" text="About Us" />
        <x-menu.navbar.mobileLink href="/contact" text="Contact" />
    </div>
  </div>
</nav>