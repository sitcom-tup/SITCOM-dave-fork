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

Route::get('/', function () {
    return redirect('/login');
});

// Route::view('/{path?}', 'index');

Route::view('/dashboard', 'dashboard.coordinator');

Route::view('/login', 'login.index');
Route::view('/login/student', 'login.student');
Route::view('/login/supervisor', 'login.supervisor');
Route::view('/login/coordinator', 'login.coordinator');
Route::view('/login/admin', 'login.admin');

Route::view('/register', 'register.index');
Route::view('/register/student', 'register.student');
Route::view('/register/coordinator', 'register.coordinator');
Route::view('/register/supervisor', 'register.supervisor');

Route::get('/api/v1/tests', function() {
    return view('api-test');
});

// Password Reset Index
Route::group(['middleware' => ['prevent_back']], function() { 
    Route::get('/requests/passwords/actions',[PasswordResetController::class,'index'])->name('action_reset');
    Route::post('/requests/passwords/send',[PasswordResetController::class,'resetPassword'])->name('send_password');
    Route::get('/requests/passwords/success',[PasswordResetController::class,'successPassword'])->name('success_password');
});