<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Intern;

class TimeRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        
        $interns = Intern::count();
        for($i = 1; $i < $interns; $i++)
        {
            $intern = Intern::find($i);
            
            $rows = round($intern->rendered_hours / 8);
            
            for($j = 0; $j < $rows; $j++)    
            {    
                $status = rand(0,3);
        
                $minute = rand(0,14);
        
                $minute <= 9 ? $minute = '0'.$minute : $minute; 
        
                switch ($status) {
                    case 0: //on time 
                        $timein =  '08:'.$minute.':00';
                        break;
                    case 1: //late
                        $timein =  '08:'.$minute.':00';
                        $timein = \Carbon\Carbon::parse($timein)->addMinutes(rand(1,40))->format('H:i:s');
                        break;
                    case 2: //excused
                        $timein =  '08:00:00';
                        break;
                    case 3: //absent 
                        $timein =  '00:00:00';
                        break;
                    default:
                        $timein = '00:00:00';
                        break;
                }

                $timed_in = $faker->unique()->dateTimeBetween($startDate = $intern->start_date.' 00:00:00', $endDate = 'now', $timezone = null)->format('Y-m-d ');
                $timed_out = \Carbon\Carbon::parse($timein)->addHours(8)->format('H:i:s');

                \App\Models\TimeRecord::create([
                    'student_id' =>$intern->student_id,
                    'date' => \Carbon\Carbon::parse($timed_in)->format('Y-m-d'),
                    'time_in' =>$timein,
                    'time_out' =>$timed_out,
                    'status' => $status,
                    // 'latitude' => $faker->latitude(),
                    // 'longitude' => $faker->longitude(),
                    'timein_location' => $faker->address(),
                    'verified' => rand(0,1),
                ]);
            }
        }
    }
}
