<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

// Login
Route::post('/login/admins', [LoginController::class, 'adminLogin']);
Route::post('/login/students', [LoginController::class, 'studentLogin']);
Route::post('/login/coordinators', [LoginController::class, 'coordinatorLogin']);
Route::post('/login/supervisors', [LoginController::class, 'supervisorLogin']);


// for admins == api 
Route::middleware(['auth:api','scopes:user'])->group(function () {
    Route::get('/admins', function(Request $request){
        return $request->user();
    });
});



Route::middleware(['auth:student-api','scopes:student'])->group(function () {
    Route::get('/students', function(Request $request){
        return $request->user();
    });
});



Route::middleware(['auth:coordinator-api','scopes:coordinator'])->group(function () {
    Route::get('/coordinators', function(Request $request){
        return $request->user();
    });
});



Route::middleware(['auth:supervisor-api','scopes:supervisor'])->group(function () {
    Route::get('/supervisors', function(Request $request){
        return $request->user();
    });
});

