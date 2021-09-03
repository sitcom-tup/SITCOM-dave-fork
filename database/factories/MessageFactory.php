<?php

namespace Database\Factories;

use App\Models\Message;
use App\Services\ReceiveOrderNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

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
            'senders' =>\App\Models\User::inRandomOrder()->first()->getKey(),
            'receivers' =>\App\Models\User::inRandomOrder()->first()->getKey(),
            'content'=>'<p>Hello World</p>',
        ];
    }
}
