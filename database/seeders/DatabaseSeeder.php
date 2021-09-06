<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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

        // Batch 
        \App\Models\Batch::create(['year' => Carbon::now()->format('Y')]);
        for($i=1;$i < 10; $i++)
        {
            \App\Models\Batch::create(['year' => Carbon::now()->addYear($i)->format('Y')]);
        }

        // Create for unlisted company 
        \App\Models\Company::create(['comp_name' => 'unlisted', 'comp_email'=> 'N/A','comp_contact' => '000000000','comp_address' => 'N/A','comp_website'=>'N/A']);
        \App\Models\Company::factory(10)->create();
        
        for($i=0;$i < 50; $i++)
        {
            \App\Models\User::factory(1)->create(['role' => 3]);
            \App\Models\Student::factory(1)->create();
        }
        for($i=0;$i < 10; $i++)
        {
            \App\Models\User::factory(1)->create(['role' => 5]);
            \App\Models\Supervisor::factory(1)->create();
        }
        for($i=0;$i < 20; $i++)
        {
            \App\Models\User::factory(1)->create(['role' => 4]);
            \App\Models\Coordinator::factory(1)->create();
        }

        \App\Models\Announcement::factory(10)->create();
        \App\Models\Job::factory(50)->create();
        \App\Models\Message::factory(20)->create();
        \App\Models\UserPool::factory(30)->create();
        \App\Models\Intern::factory(50)->create();
        

        // \App\Models\Department::create(['department_name'=>'Electrical Engineering Department']);
        // \App\Models\Course::create(['course_name'=>'BSIT','course_fullText' => 'BS Information Tech', 'department_id' => 1]);
        // \App\Models\Coordinator::factory(10)->create();
        // \App\Models\Supervisor::factory(10)->create();
    }
}
