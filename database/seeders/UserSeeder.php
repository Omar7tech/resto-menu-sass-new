<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Database\Factories\MenuFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function ($user) {
            $menu = Menu::factory()->for($user)->create();
            Category::factory(10)->for($menu)->create()->each(function ($category) use ($menu) {
                Product::factory(15)->for($category)->for($menu)->create();
            });
        });
    }
}
