<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Intern;
use \Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [1,2,3,4,5]; // Day of week from carbon is 0 = Sunday - 6 = Saturday thus this days are from mon-friday
        
        $interns = Intern::count();
        for($i = 1; $i < $interns; $i++)
        {
            $intern = Intern::find($i);

            foreach($days as $day)
            {
                \App\Models\Schedule::firstOrCreate([
                    'student_id' => $intern->student_id,
                    'supervisor_id' => $intern->supervisor_id,
                    'in_time' => \Carbon\Carbon::parse('08:00:00')->format('h:i:s'),
                    'out_time' => Carbon::createFromFormat('h:i:s', '08:00:00')->addHours(8),
                    'day_of_week'=> $day,
                    'in_time_provision' => Carbon::createFromFormat('h:i:s', '08:00:00')->addMinutes(15),
                ]);
            }
        }
    }
}
