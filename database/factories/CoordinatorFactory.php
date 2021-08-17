<?php

namespace Database\Factories;

use Hash;
use Str;
use App\Models\Coordinator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoordinatorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coordinator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => 1,
            'coor_fname' => $this->faker->firstName,
            'coor_lname' => $this->faker->lastName,
            'coor_email' => $this->faker->unique()->safeEmail,
            'coor_password' => Hash::make('password'),
            'coor_gender' => $this->faker->randomElement(['male' ,'female', 'other']),
            'coor_contact' => $this->faker->numerify('###########'),
            'coor_position' => 'Teacher II',
            'coor_link' => '/avatar.jpg',
            'coor_state' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
