<?php

namespace Database\Factories;

use App\Models\TimeRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TimeRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = rand(0,4);

        // switch ($status) {
        //     case 0: //on time 
        //         $timein =  Carbon::n
        //         break;
        //     default:
        //         # code...
        //         break;
        // }

        return [
            // 'student_id' =>,
            // 'time_in' =>,
            // 'time_out' =>,
            'status' => $status,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
