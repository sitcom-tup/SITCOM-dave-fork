<?php

namespace Database\Factories;

use App\Models\ColumnCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColumnCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ColumnCard::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $board = \App\Models\Board::inRandomOrder()->first();
        $users = explode(',',$board->board_users);
        // dd($users, rand(min($users),max($users)), implode(',',$users));
        return [
            'column_id' => \App\Models\BoardColumn::inRandomOrder()->first()->getKey(),
            'user_id' => rand(min($users),max($users)),
            'assignees' => implode(',',$users),
            'card_name' => $this->faker->word,
            'card_description' => $this->faker->sentence,
            'start_date' => $this->faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now', $timezone = null),
            'due_date' => $this->faker->dateTimeBetween($startDate = '-10 days', $endDate = 'now', $timezone = null),
            'status' => rand(0,3),
            'verified' => rand(0,1),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
