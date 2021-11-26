<?php

namespace Database\Factories;

use App\Models\Coordinator;
use App\Models\Announcement;
use App\Models\Course;
use Carbon\Carbon;
use App\Services\ReceiveOrderNumber;
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
        $number = new ReceiveOrderNumber();
        $coordinator = Coordinator::inRandomOrder()->first();
        $ids = $this->deparmentCoursesId($coordinator->department_id);
        return [
            'coordinator_id' => $coordinator->getKey(),
            'courses' => $ids,
            'heading' => $this->faker->realText(50),
            'body' => $this->faker->bodyText(),
            'uuid_link' => $number->generateOrderNumber(),
            'posted_at'=> Carbon::now()->toDateString(),
        ];
    }

    public function deparmentCoursesId($id)
    {
        $courses = Course::where('department_id',$id)->pluck('id');
        return substr(implode(',',array($courses)), 1, -1);
    }
}
