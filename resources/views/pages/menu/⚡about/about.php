<?php

use App\Models\Menu;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

new class extends Component
{
    public Menu $menu;

    public function mount()
    {
        // Check if About Us is enabled, if not throw 404
        if (!$this->menu->enable_aboutus) {
            throw new NotFoundHttpException('About Us page is not available');
        }
    }

     public function render()
    {
        return $this->view()
            ->title('About Us - ' . e($this->menu->name));
    }
};