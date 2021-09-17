<?php

namespace Database\Factories;

use App\Models\BoardColumn;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardColumnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BoardColumn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'board_id' => \App\Models\Board::inRandomOrder()->first()->getKey(),
            'column_name' => $this->faker->word,
            'column_styles' => '<p>html/css here of card</p>'
        ];
    }
}
