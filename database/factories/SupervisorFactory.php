<?php

namespace Database\Factories;

use Str;
use Hash;
use App\Models\Supervisor;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupervisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supervisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id'=> Company::inRandomOrder()->first()->getKey(),
            'supervisor_fname' => $this->faker->firstName,
            'supervisor_lname' => $this->faker->lastName,
            'supervisor_email' => $this->faker->unique()->safeEmail,
            'supervisor_password' => Hash::make('password'),
            'supervisor_contact' => $this->faker->numerify('###########'),
            'supervisor_position' => 'Supervisor',
            'supervisor_gender'=> $this->faker->randomElement(['male' ,'female', 'other']),
            'supervisor_link' => '/avatar.jpg',
            'supervisor_state' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
