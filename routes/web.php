<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\GuardianAuthController;

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

Route::get('/student', [UserAuthController::class, 'index'])->name('user.home')->middleware("auth:web");
Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
Route::post('/login', [UserAuthController::class, 'handleLogin'])->name('user.handleLogin');

Route::get('/guardian', [GuardianAuthController::class, 'index'])->name('guardian.home')->middleware("auth:webguardian");
Route::get('/guardian/login', [GuardianAuthController::class, 'login'])->name('guardian.login');
Route::get('/guardian/logout', [GuardianAuthController::class, 'logout'])->name('guardian.logout');
Route::post('/guardian/login', [GuardianAuthController::class, 'handleLogin'])->name('guardian.handleLogin');