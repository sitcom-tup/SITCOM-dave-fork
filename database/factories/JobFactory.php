<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::find(rand(51,75))->id,
            'title' => $this->faker->jobTitle,
            'type' => $this->faker->jobType(),
            'description' => $this->faker->catchPhrase,
            'qualification'=> $this->faker->bs,
            'status' => rand(0,1),
            'verified_at' => now()
        ];
    }
}
