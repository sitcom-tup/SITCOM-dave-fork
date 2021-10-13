<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function getCourses()
    {
        $courses = Course::orderBy('course_name','asc')->get();

        return CourseResource::collection($courses);
    }
}
