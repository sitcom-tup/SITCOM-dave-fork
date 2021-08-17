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
            'sup_fname' => $this->faker->firstName,
            'sup_lname' => $this->faker->lastName,
            'sup_email' => $this->faker->unique()->safeEmail,
            'sup_password' => Hash::make('password'),
            'sup_contact' => $this->faker->numerify('###########'),
            'sup_position' => 'Supervisor',
            'sup_gender'=> $this->faker->randomElement(['male' ,'female', 'other']),
            'sup_link' => '/avatar.jpg',
            'sup_state' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
