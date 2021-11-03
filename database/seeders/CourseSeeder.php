<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Course;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['department_name'=>'BASIC ARTS & SCIENCES'])->save();
        Course::create(['course_name'=>'BSESSDP-T','course_fulltext' => 'Bachelor of Science in Environmental Science ', 'department_id' => 1])->save();
        
        Department::create(['department_name'=>'AUTOMOTIVE ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETAT-T','course_fulltext' => 'BET Major in Automotive Technology  ', 'department_id' => 2])->save();
        
        Department::create(['department_name'=>'CIVIL ENGINEERING & ARCHITECTURAL TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BSCESEP-T','course_fulltext' => 'Bachelor of Science in Civil Engineering', 'department_id' => 3])->save();
        Course::create(['course_name'=>'BGTAT-T','course_fulltext' => 'Bachelor in Graphics Technology Major in Architecture Technology ', 'department_id' => 3])->save();
        
        Department::create(['department_name'=>'CHEMICAL ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETChT-T','course_fulltext' => 'BET Major in Chemical Technology ', 'department_id' => 4])->save();
        
        Department::create(['department_name'=>'COMPUTER ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BSIT-T','course_fulltext' => 'Bachelor of Science in Information Technology  ', 'department_id' => 5])->save();
        Course::create(['course_name'=>'BSIS-T','course_fulltext' => 'Bachelor of Science in Information System   ', 'department_id' => 5])->save();
        
        Department::create(['department_name'=>'ELECTRICAL ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BSEESEP-T','course_fulltext' => 'Bachelor of Science in Electrical Engineering', 'department_id' => 6])->save();
        Course::create(['course_name'=>'BETET-T','course_fulltext' => 'BET Major in Electrical Technology', 'department_id' => 6])->save();
        
        Department::create(['department_name'=>'ELECTROMECHANICAL ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETEMT-T','course_fulltext' => 'BET Major in Electromechanical Technology', 'department_id' => 7])->save();
        
        Department::create(['department_name'=>'ELECTRONICS ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BSECESEP-T','course_fulltext' => 'Bachelor of Science in Electronics Engineering', 'department_id' => 8])->save();
        Course::create(['course_name'=>'BETElxT-T','course_fulltext' => 'BET Major in Electronics Technology', 'department_id' => 8])->save();
        
        Department::create(['department_name'=>'INSTRUMENTATION & CONTROL ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETInCT-T','course_fulltext' => 'BET Major in Instrumentation and Control Technology', 'department_id' => 9])->save();    
        
        Department::create(['department_name'=>'MECHANICAL & TOOL ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BSMESEP-T','course_fulltext' => 'Bachelor of Science in Mechanical Engineering', 'department_id' => 10])->save();   
        Course::create(['course_name'=>'BETMT-T','course_fulltext' => 'BET Major in Mechanical Technology', 'department_id' => 10])->save();    
        Course::create(['course_name'=>'BETMecT-T','course_fulltext' => 'BET Major in Mechatronics Technology', 'department_id' => 10])->save();   
        
        Department::create(['department_name'=>'NON-DESTRUCTIVE TESTING ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETNDTT-T','course_fulltext' => 'BET Major in Non-Destructive Testing Technology', 'department_id' => 11])->save();    
        Course::create(['course_name'=>'BETDMT-T','course_fulltext' => 'BET Major in Dies & Moulds Technology', 'department_id' => 11])->save();        
        
        Department::create(['department_name'=>'REFRIGERATION & AIRCONDITIONING ENGINEERING TECHNOLOGY'])->save();
        Course::create(['course_name'=>'BETHVAC/RT-T','course_fulltext' => 'BET Major in Heating, Ventilation and Airconditioning/Refrigeration Technology', 'department_id' => 12])->save();    
        
        Department::create(['department_name'=>'BACHELOR OF ENGINEERING'])->save();
        Course::create(['course_name'=>'BETCT-T','course_fulltext' => 'BET Major in Construction Technology', 'department_id' => 13])->save();   
        
        Department::create(['department_name'=>'BTVTE']);
        Course::create(['course_name'=>'BTVTEdICT-T','course_fulltext' => 'BTVTE Major in Information and Communication Technology', 'department_id' => 14])->save();    
        Course::create(['course_name'=>'BTVTEdET-T','course_fulltext' => 'BTVTE Major in Electrical Technology', 'department_id' => 14])->save();   
        Course::create(['course_name'=>'BTVTEdElxT-T','course_fulltext' => 'BTVTE Major in Electronics Technology', 'department_id' => 14])->save();   
    }
}
