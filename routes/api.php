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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login
// Route::post('/login/student', [LoginController::class, 'studentLogin'])->prefix('v1');




// Route::middleware(['auth:student','scopes:student'])->group(function () {
//     Route::get('/student', function(Request $request){
//         return $request->user();
//     });
// });

