<?php

namespace Database\Factories;

use App\Models\Intern;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intern::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $number = 1;
        
        return [
            'student_id' => $number++,
            'supervisor_id' => $this->faker->numberBetween(1,10),
            'coordinator_id' => $this->faker->numberBetween(1,20),
            'required_hours' => 480,
            'rendered_hours' => rand(0,300),
            'endorsement_date' => $this->faker->dateTimeBetween($startDate = '-90 days', $endDate = '-80 days', $timezone = null),
            'start_date' => $this->faker->dateTimeBetween($startDate = '-90 days', $endDate = 'now', $timezone = null), //Asia/Manila
            // 'end_date' => $this->faker->,
            // 'files_id' => $this->faker->,
            // 'remarks' => $this->faker->,
            'created_at' => now(),
            'updated_at'=> now(),
            
        ];
    }
}
