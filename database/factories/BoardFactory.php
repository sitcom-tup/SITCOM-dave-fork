<?php

namespace Database\Factories;

use App\Models\Board;
use App\Services\ReceiveOrderNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Board::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $number = new ReceiveOrderNumber();

        return [
            'id' => $number->generateOrderNumber(),
            'board_name' => $this->faker->word,
            'board_users' => implode(',', $this->users()),
        ];
    }
    
    public function users()
    {
        $users = [];
        for($i=0;$i<5;$i++)
        {
            array_push($users,$this->faker->numberBetween(2,60));
        }
        return $users;
    }
}
