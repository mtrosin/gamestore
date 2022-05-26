<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        Game::factory(10)->create();
    }
}
