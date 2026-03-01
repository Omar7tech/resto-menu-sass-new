<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['name' => 'Administration', 'role' => UserRole::ADMIN->value , 'password' => 'password' , 'email' => 'admin@menuengine.com']);
        $this->call([
            UserSeeder::class,
        ]);
    }
}
