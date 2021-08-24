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
            RoleSeeder::class,
            AdminSeeder::class
        ]);

        \App\Models\Company::factory(10)->create();
        
        for($i=0;$i < 50; $i++)
        {
            \App\Models\User::factory(1)->create();
            \App\Models\Student::factory(1)->create();
        }
        for($i=0;$i < 10; $i++)
        {
            \App\Models\User::factory(1)->create();
            \App\Models\Supervisor::factory(1)->create();
        }
        for($i=0;$i < 20; $i++)
        {
            \App\Models\User::factory(1)->create();
            \App\Models\Coordinator::factory(1)->create();
        }

        \App\Models\Announcement::factory(10)->create();


        // \App\Models\Department::create(['department_name'=>'Electrical Engineering Department']);
        // \App\Models\Course::create(['course_name'=>'BSIT','course_fullText' => 'BS Information Tech', 'department_id' => 1]);
        // \App\Models\Coordinator::factory(10)->create();
        // \App\Models\Supervisor::factory(10)->create();
    }
}
