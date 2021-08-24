<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentDepartmentCollection;
use App\Http\Resources\StudentResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Student;

class StudentDepartmentController extends Controller
{
    public function getStudentDepartment(Request $request, Department $department)
    {
        $dept = $department->courseStudent()->latest()->paginate(2);
        // return StudentResource::collection($dept);
        return new StudentDepartmentCollection($dept);
    }
}
