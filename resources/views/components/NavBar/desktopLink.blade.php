@props(['href', 'text'])

<a href="{{ $href }}" class="text-lg font-medium text-primary/80 hover:text-primary transition-all duration-300 relative group pl-0 hover:pl-1">
  {{ $text }}
  <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 primary-color-bg group-hover:w-full transition-all duration-300"></span>
</a>
