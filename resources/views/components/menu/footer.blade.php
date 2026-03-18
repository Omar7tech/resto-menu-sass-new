@props(['menu' => null])

<footer class="border-t border-[rgb(var(--border-secondary))] bg-[rgb(var(--bg-primary))] text-[rgb(var(--text-secondary))] mt-auto">
  <div class="max-w-[1500px] mx-auto px-4 sm:px-5 lg:px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      
      <!-- Brand Section -->
      <div class="space-y-4">
        @if($menu)
          <div class="flex items-center space-x-3">
            @if($menu->is_logo_typography)
              <span class="font-bold text-xl {{ $menu->typography_logo_follow_primary_color ? 'primary-color-text' : 'text-primary' }}" 
                    @if($menu->typography_logo_follow_primary_color) 
                      style="color: {{ $menu->primary_color ?? '#652FF5' }};" 
                    @endif>
                {{ $menu->name }}
              </span>
            @else
              @if($menu->getFirstMedia('logo'))
                <img src="{{ $menu->getFirstMediaUrl('logo') }}" alt="{{ $menu->name }}" class="h-8 w-auto object-contain max-w-[200px]">
              @else
                <span class="font-bold text-xl {{ $menu->typography_logo_follow_primary_color ? 'primary-color-text' : 'text-primary' }}" 
                      @if($menu->typography_logo_follow_primary_color) 
                        style="color: {{ $menu->primary_color ?? '#652FF5' }};" 
                      @endif>
                  {{ $menu->name }}
                </span>
              @endif
            @endif
          </div>
          @if($menu->description)
            <p class="text-sm leading-relaxed">{{ $menu->description }}</p>
          @endif
        @else
          <div class="flex items-center space-x-3">
            <span class="font-bold text-xl text-primary">Menu Engine</span>
          </div>
          <p class="text-sm leading-relaxed">Beautiful restaurant menus made simple.</p>
        @endif
      </div>

      <!-- Quick Links -->
      <div class="space-y-4">
        <h3 class="font-semibold text-[rgb(var(--text-primary))] text-sm uppercase tracking-wider">Quick Links</h3>
        <nav class="space-y-2">
          <a href="/menu" class="block text-sm hover:text-[rgb(var(--text-primary))] transition-colors duration-200">Menu</a>
          <a href="/about" class="block text-sm hover:text-[rgb(var(--text-primary))] transition-colors duration-200">About Us</a>
          <a href="/contact" class="block text-sm hover:text-[rgb(var(--text-primary))] transition-colors duration-200">Contact</a>
        </nav>
      </div>

      <!-- Contact Info -->
      <div class="space-y-4">
        <h3 class="font-semibold text-[rgb(var(--text-primary))] text-sm uppercase tracking-wider">Contact</h3>
        <div class="space-y-2 text-sm">
          <div class="flex items-center space-x-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
            </svg>
            <span>contact@example.com</span>
          </div>
          <div class="flex items-center space-x-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
            </svg>
            <span>+1 (555) 123-4567</span>
          </div>
          <div class="flex items-center space-x-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
            </svg>
            <span>123 Restaurant Street, City, State 12345</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-[rgb(var(--border-secondary))] mt-8 pt-6">
      <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
        <p class="text-sm text-[rgb(var(--text-secondary))]">
          © {{ date('Y') }} {{ $menu->name ?? 'Menu Engine' }}. All rights reserved.
        </p>
        <div class="flex items-center space-x-6">
          <a href="/privacy" class="text-sm hover:text-[rgb(var(--text-primary))] transition-colors duration-200">Privacy Policy</a>
          <a href="/terms" class="text-sm hover:text-[rgb(var(--text-primary))] transition-colors duration-200">Terms of Service</a>
        </div>
      </div>
    </div>
  </div>
</footer>
