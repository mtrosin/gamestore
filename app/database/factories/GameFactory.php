<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gameIDs = Category::all()->pluck('id')->toArray();

        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'category_id' => $this->faker->randomElement($gameIDs)
        ];
    }
}
