<?php

use App\Models\Menu;
use Livewire\Attributes\Title;
use Livewire\Component;


new class extends Component {
    public Menu $menu;


    public function render()
    {
        return $this->view()
            ->title($this->menu->meta_title);
    }
};