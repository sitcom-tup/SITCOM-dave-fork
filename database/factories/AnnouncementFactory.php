<?php

namespace Database\Factories;

use App\Models\Coordinator;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'coordinator_id' => Coordinator::inRandomOrder()->first()->getKey(),
            'heading' => $this->faker->realText(50),
            'body' => $this->faker->bodyText()
        ];
    }
}
