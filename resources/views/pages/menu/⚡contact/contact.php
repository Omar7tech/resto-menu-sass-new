<?php

use App\Models\Menu;
use Livewire\Component;

new class extends Component
{
    public Menu $menu;

     public function render()
    {
        return $this->view()
            ->title('Contact Us - ' . e($this->menu->name));
    }
};