<?php

namespace Database\Factories;

use App\Models\UserPool;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPool::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $devices = ['web','mobile'];
        $num = rand(0,1);

        return [
            'socket_id' => bin2hex(random_bytes(8)),
            'isActive' => $num,
            'lastSeen' => now(),
            'user_id' => $this->faker->unique()->numberBetween(2,60),
            'device' => $devices[$num],
        ];
    }
}
