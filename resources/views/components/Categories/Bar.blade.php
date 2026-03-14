<div class="flex gap-2 overflow-auto py-2">
  @foreach ($menu->categories as $category)
    <x-categories.bar-badge :name="$category->name" />
  @endforeach
</div>