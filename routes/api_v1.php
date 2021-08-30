<?php

use App\Http\Controllers\Api\V1\StudentDepartmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('routes', function() {
    $routeCollection = Route::getRoutes();
    return response()->json($routeCollection->getRoutes());
});



// Login
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout']);
// Route::post('login/admins', [LoginController::class, 'adminLogin']);
// Route::post('login/students', [LoginController::class, 'studentLogin']);
// Route::post('login/coordinators', [LoginController::class, 'coordinatorLogin']);
// Route::post('login/supervisors', [LoginController::class, 'supervisorLogin']);
// Register
Route::post('register/admins', [RegisterController::class, 'adminRegister']);
Route::post('register/students', [RegisterController::class, 'studentRegister']);
Route::post('register/coordinators', [RegisterController::class, 'coordinatorRegister']);
Route::post('register/supervisors', [RegisterController::class, 'supervisorRegister']);



// for all authenticated roles inside Auth using Auth:check();
Route::group(['middleware' => ['auth:api']], function() { 
    Route::get('/departments/{department}/students', [StudentDepartmentController::class, 'getStudentDepartment']);
    Route::apiResources([
        'announcements' => AnnouncementController::class,
        'profiles/students' => StudentProfileController::class,
        'profiles/coordinators' => CoordinatorProfileController::class,
        'profiles/supervisors' => SupervisorProfileController::class,
    ]);
    Route::apiResource('jobs', JobController::class);
});


// Fallback route 
Route::fallback(function (Request $request) {
    return response()->json(['error'=>'404 resource not found'],404);
});