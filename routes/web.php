<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\GuardianAuthController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TeacherHomeworkController;
use App\Http\Controllers\TeacherHomeworkController2;


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
    return view('welcome');
});

Route::get('/student', [UserAuthController::class, 'index'])
    ->name('user.home')
    ->middleware("auth:web");
Route::get('/login', [UserAuthController::class, 'login'])
    ->name('user.login');
Route::get('/logout', [UserAuthController::class, 'logout'])
    ->name('user.logout');
Route::post('/login', [UserAuthController::class, 'handleLogin'])
    ->name('user.handleLogin');

Route::get('/guardian', [GuardianAuthController::class, 'index'])
    ->name('guardian.home')
    ->middleware("auth:webguardian");
Route::get('/guardian/login', [GuardianAuthController::class, 'login'])
    ->name('guardian.login');
Route::get('/guardian/logout', [GuardianAuthController::class, 'logout'])
    ->name('guardian.logout');
Route::post('/guardian/login', [GuardianAuthController::class, 'handleLogin'])
    ->name('guardian.handleLogin');

// Route::get('/teacher', [TeacherHomeworkController::class, 'index'])
//     ->name('teacher.home')
//     ->middleware("auth:webteacher");
Route::get('/teacher/login', [TeacherAuthController::class, 'login'])
    ->name('teacher.login');
Route::get('/teacher/logout', [TeacherAuthController::class, 'logout'])
    ->name('teacher.logout');
Route::post('/teacher/login', [TeacherAuthController::class, 'handleLogin'])
    ->name('teacher.handleLogin');


// Route::resource('/teacher', TeacherHomeworkController2::class);
Route::get('/teacher', [TeacherHomeworkController::class, 'index'])
    ->name('teacher.home')
    ->middleware("auth:webteacher");
Route::get('/teacher/uploadpage', [TeacherHomeworkController::class, 'uploadpage'])
    ->name('teacher.uploadpage')
    ->middleware("auth:webteacher");
Route::post('/teacher/uploadfile', [TeacherHomeworkController::class, 'store'])
    ->name('teacher.uploadfile')
    ->middleware("auth:webteacher");
Route::get('/teacher/{id}/edit', [TeacherHomeworkController::class, 'edit'])
    ->name('teacher.edit')
    ->middleware("auth:webteacher");
Route::post('/teacher/updatefile', [TeacherHomeworkController::class, 'update'])
    ->name('teacher.updatefile')
    ->middleware("auth:webteacher");
Route::post('/teacher/{id}', [TeacherHomeworkController::class, 'destroy'])
    ->name('teacher.deletefile')
    ->middleware("auth:webteacher");