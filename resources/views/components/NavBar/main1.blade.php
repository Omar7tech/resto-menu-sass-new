<nav class="bg-primary/95 backdrop-blur-md border-b border-primary/50 shadow-sm sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo -->
      <a href="/"
        class="flex items-center space-x-3 group p-1 rounded-xl transition-all duration-300">
       
        <span
          class="font-bold text-xl text-primary hidden lg:inline">
          {{ $menu->name }}
        </span>
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center space-x-1 font-medium">
        <a href="/menu"
          class="group px-4 py-3 text-primary relative after:absolute after:bottom-0 after:left-4 after:w-2 after:h-2  after:rounded-full after:opacity-0 after:group-hover:opacity-100 after:transition-all">
          Menu
        </a>
        <a href="/about"
          class="group px-4 py-3 text-primary relative after:absolute after:bottom-0 after:left-4 after:w-2 after:h-2  after:rounded-full after:opacity-0 after:group-hover:opacity-100 after:transition-all">
          About Us
        </a>
        <a href="/contact"
          class="group px-4 py-3 text-primary relative after:absolute after:bottom-0 after:left-4 after:w-2 after:h-2  after:rounded-full after:opacity-0 after:group-hover:opacity-100 after:transition-all">
          Contact
        </a>
      </div>

      <!-- Cart + Mobile Menu -->
      <div class="flex items-center space-x-2">
        <!-- Modern Shopping Bag -->
        <a href="/cart"
          class="group relative p-2.5 text-primary backdrop-blur-sm rounded-2xl  hover:-translate-y-0.5 hover:bg-[var(--primary-color)/0.08] hover:border-[var(--primary-color)/0.3] transition-all duration-300">
          <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current">
            <circle cx="16.5" cy="18.5" r="1.5" />
            <circle cx="9.5" cy="18.5" r="1.5" />
            <path
              d="M18 16H8a1 1 0 0 1-.958-.713L4.256 6H3a1 1 0 0 1 0-2h2a1 1 0 0 1 .958.713L6.344 6H21a1 1 0 0 1 .937 1.352l-3 8A1 1 0 0 1 18 16zm-9.256-2h8.563l2.25-6H6.944z" />
          </svg>

          <span
            class="absolute -top-1 -right-1 primary-color-bg text-xs font-bold rounded-full flex items-center justify-center shadow-lg w-5 h-5 border-2 primary-color-border primary-color-text">3</span>
        </a>

        <!-- Mobile hamburger -->
        <button
          class="lg:hidden p-3 bg-primary/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl hover:bg-[var(--primary-color)/0.08] hover:text-(--primary-color) transition-all duration-300 text-primary">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>