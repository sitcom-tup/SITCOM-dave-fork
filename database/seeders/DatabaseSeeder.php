<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CourseSeeder::class,
        ]);

        \App\Models\User::factory(5)->create();
        \App\Models\Company::factory(10)->create();
        // \App\Models\Department::create(['department_name'=>'Electrical Engineering Department']);
        // \App\Models\Course::create(['course_name'=>'BSIT','course_fullText' => 'BS Information Tech', 'department_id' => 1]);
        \App\Models\Student::factory(10)->create();
        \App\Models\Coordinator::factory(10)->create();
        \App\Models\Supervisor::factory(10)->create();
        \App\Models\Announcement::factory(10)->create();
    }
}
