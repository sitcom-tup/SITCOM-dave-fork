<?php

use App\Http\Controllers\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::view('/{path?}', 'index');

Route::view('/home', 'home.index');
Route::view('/login', 'login.index');
Route::view('/login/student', 'login.student');

Route::get('/api/v1/tests', function() {
    return view('api-test');
});

// Password Reset Index
Route::group(['middleware' => ['prevent_back']], function() { 
    Route::get('/requests/passwords/actions',[PasswordResetController::class,'index'])->name('action_reset');
    Route::post('/requests/passwords/send',[PasswordResetController::class,'resetPassword'])->name('send_password');
    Route::get('/requests/passwords/success',[PasswordResetController::class,'successPassword'])->name('success_password');
});