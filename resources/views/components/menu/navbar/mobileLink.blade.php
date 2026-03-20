@props(['href', 'text'])

<a wire:navigate href="{{ $href }}" 
   @click="open = false" 
   class="block text-lg font-medium text-primary hover:text-primary transition-colors py-2">
  {{ $text }}
</a>