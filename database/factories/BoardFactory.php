<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardUser;
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
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Board $board) {
            $users  = $board->boardUsers()->saveMany($this->createBoardUsers($board));
        });
    }
    
    public function createBoardUsers($board)
    {
        $users = [];
        for ($i = 0; $i < 5; $i++) {
                array_push($users, BoardUser::make([
                    'board_id' => $board,
                    'user_id' => $this->faker->numberBetween(2,60),
                ]));
        }
        return $users;
    }
}
