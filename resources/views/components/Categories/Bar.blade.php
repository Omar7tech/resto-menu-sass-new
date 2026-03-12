<div class="flex gap-2 overflow-auto">
  @foreach ($menu->categories as $category)
    <div class="primary-color-bg primary-color-text px-4 py-2 rounded-full">
      {{ $category->name }}
    </div>
  @endforeach
</div>