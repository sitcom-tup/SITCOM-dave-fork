<?php

use App\Http\Controllers\Api\V1\StudentDepartmentController;
use App\Http\Controllers\Api\V1\TimeRecordController;
use App\Http\Controllers\Api\V1\UserPoolController;
use App\Http\Controllers\Api\V1\MessageController;
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



// Login & Logout
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout']);
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
        'companies' => CompanyProfileController::class,
        'profiles/coordinators' => CoordinatorProfileController::class,
        'profiles/students' => StudentProfileController::class,
        'profiles/supervisors' => SupervisorProfileController::class,
        'interns' => InternController::class,
    ]);
    Route::apiResource('jobs', JobController::class);

    // messages
    Route::get('messages',[MessageController::class,'index']);
    Route::get('messages/{messages}',[MessageController::class,'show']);
    Route::post('messages',[MessageController::class,'store']);

    // User pools for current active and inactive users
    Route::get('userpools',[UserPoolController::class,'index']);
    Route::post('userpools/connect',[UserPoolController::class,'connect']);
    Route::delete('userpools/disconnect/{socketId}',[UserPoolController::class,'disconnect']);

    // Time Record or the DTR Daily Time Record
    Route::get('dailytime/records', [TimeRecordController::class, 'index']);
    Route::get('dailytime/records/{id}', [TimeRecordController::class, 'show']);
    Route::put('dailytime/records/{id}', [TimeRecordController::class, 'update']);
    Route::delete('dailytime/records/{id}', [TimeRecordController::class, 'destroy']);
    Route::post('dailytime/records/timein', [TimeRecordController::class, 'storeByStudent']);
    Route::put('dailytime/records/timeout/{id}', [TimeRecordController::class, 'updateByStudent']);
    Route::post('dailytime/records/supervisorcreate', [TimeRecordController::class, 'storeBySupervisor']);

    // Trainee Schedules
    Route::apiResource('trainings/schedules',TraineeScheduleController::class)->only(['index','store','destroy']);

    // Trainee / Supervisor Boards
    Route::apiResource('projects/boards', BoardController::class)->only(['index','store','update','destroy']);
    Route::apiResource('projects/columns', BoardColumnController::class)->only(['store','destroy']);
    Route::apiResource('projects/cards', ColumnCardController::class)->only(['store','update','destroy']);
});


// Fallback route 
Route::fallback(function (Request $request) {
    return response()->json(['status'=>'failed','code'=>404,'error'=>'404 resource not found'],404);
});