<?php

namespace Database\Factories;

use Hash;
use Str;
use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = User::latest('id')->first();
        
        return [
            'user_id' => $id->id,
            // 'student_fname' => $this->faker->firstName,
            // 'student_lname' => $this->faker->lastName,
            'student_tup_id' => 'TUPT-18'.$this->faker->numerify('-####'),
            'course_id' => Course::inRandomOrder()->first()->getKey(),
            // 'course_id' => 1,
            // 'student_email' => $this->faker->unique()->safeEmail,
            // 'student_password' => Hash::make('password'),
            'student_gender' => $this->faker->randomElement(['male' ,'female', 'other']),
            'student_address' => $this->faker->address(),
            'student_contact' => $this->faker->numerify('###########'),
            'student_birthday' => now(),
            'student_link' => '/avatar.jpg',
            // 'student_email_verified_at' => now(),
            // 'student_state' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at'=> now()
        ];
    }
}
