<?php

namespace App\Http\Controllers;

use App\Models\Menu;
class MenuController extends Controller
{
    public function Show(Menu $menu){
        $categories = $menu->categories;
        dd($categories);
    }
}

