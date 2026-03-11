<?php

namespace App\Support;

use App\Models\Menu;

class MenuContext
{
    protected ?Menu $menu = null;

    public function set(Menu $menu): void
    {
        $this->menu = $menu;
    }

    public function get(): ?Menu
    {
        return $this->menu;
    }

    public function hasMenu(): bool
    {
        return $this->menu !== null;
    }

    public function clear(): void
    {
        $this->menu = null;
    }
}
