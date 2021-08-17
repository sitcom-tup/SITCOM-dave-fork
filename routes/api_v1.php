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
Route::post('/login/student', [LoginController::class, 'studentLogin']);



Route::middleware(['auth:student-api','scopes:student'])->group(function () {
    Route::get('/students', function(Request $request){
        return $request->user();
    });
});

