<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\GuardianAuthController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\ManagerAuthController;
use App\Http\Controllers\TeacherHomeworkController;
use App\Http\Controllers\StudentHomeworkController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeacherCoursController;
use App\Http\Controllers\StudentCoursController;
use App\Http\Controllers\TeacherCorrectController;
use App\Models\StudentHomework;
use App\Models\TeacherCours;
use App\Models\TeacherHomework;

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

// ! Student Routes

// Route::get('/student', [UserAuthController::class, 'index'])
//     ->name('user.home')
//     ->middleware("auth:web");
Route::get('/login', [UserAuthController::class, 'login'])
    ->name('user.login');
Route::get('/logout', [UserAuthController::class, 'logout'])
    ->name('user.logout');
Route::post('/login', [UserAuthController::class, 'handleLogin'])
    ->name('user.handleLogin');

Route::get('/student', [StudentHomeworkController::class, 'index'])
    ->name('user.home')
    ->middleware("auth:web");
Route::get('/student/profile/{id}', [StudentHomeworkController::class, 'profile'])
    ->name('student.profile')
    ->middleware("auth:web");
Route::get('/student/correctupload', [StudentHomeworkController::class, 'correctupload'])
    ->name('student.correctupload')
    ->middleware("auth:web");
Route::get('/Student/viewmyhomework/{id}', [StudentHomeworkController::class, 'viewmyhomework'])
    ->name('student.viewmyhomework')
    ->middleware("auth:web");
Route::get('/student/viewmyhomeworkcorrect/{id}', [StudentHomeworkController::class, 'viewmyhomeworkcorrect'])
    ->name('student.viewmyhomeworkcorrect')
    ->middleware("auth:web");
Route::get('/student/viewhomework/{id}', [StudentHomeworkController::class, 'view'])
    ->name('user.viewhomework')
    ->middleware("auth:web");
Route::get('/student/downloadhomework/{file}', [StudentHomeworkController::class, 'download'])
    ->name('user.downloadhomework')
    ->middleware("auth:web");
Route::get('/student/uploadpage/{id}', [StudentHomeworkController::class, 'uploadpage'])
    ->name('student.uploadpage')
    ->middleware("auth:web");
Route::post('/student/uploadfile', [StudentHomeworkController::class, 'store'])
    ->name('student.uploadfile')
    ->middleware("auth:web");
Route::get('/student/downloadcorrection/{file}', [StudentHomeworkController::class, 'downloadCorrection'])
    ->name('user.downloadcorrection')
    ->middleware("auth:web");
Route::get('/student/arabic', [StudentHomeworkController::class, 'arabic'])
    ->name('student.arabic')
    ->middleware("auth:web");
Route::get('/student/francais', [StudentHomeworkController::class, 'francais'])
    ->name('student.francais')
    ->middleware("auth:web");
Route::get('/student/anglais', [StudentHomeworkController::class, 'anglais'])
    ->name('student.anglais')
    ->middleware("auth:web");
Route::get('/student/math', [StudentHomeworkController::class, 'math'])
    ->name('student.math')
    ->middleware("auth:web");
// ! Student Cours Routes

Route::get('/student/cours', [StudentCoursController::class, 'index'])
    ->name('student.cours')
    ->middleware("auth:web");
Route::get('/student/cours/viewcours/{id}', [StudentCoursController::class, 'view'])
    ->name('student.cours.viewcours')
    ->middleware("auth:web");
Route::get('/student/cours/downloadcours/{file}', [StudentCoursController::class, 'download'])
    ->name('student.cours.downloadcours')
    ->middleware("auth:web");
Route::get('student/cours/arabic', [StudentCoursController::class, 'arabic'])
    ->name('student.cours.arabic')
    ->middleware("auth:web");
Route::get('student/cours/francais', [StudentCoursController::class, 'francais'])
    ->name('student.cours.francais')
    ->middleware("auth:web");
Route::get('student/cours/anglais', [StudentCoursController::class, 'anglais'])
    ->name('student.cours.anglais')
    ->middleware("auth:web");
Route::get('student/cours/math', [StudentCoursController::class, 'math'])
    ->name('student.cours.math')
    ->middleware("auth:web");

// ! Guardian Routes

Route::get('/guardian', [GuardianAuthController::class, 'index'])
    ->name('guardian.home')
    ->middleware("auth:webguardian");
Route::get('/guardian/login', [GuardianAuthController::class, 'login'])
    ->name('guardian.login');
Route::get('/guardian/logout', [GuardianAuthController::class, 'logout'])
    ->name('guardian.logout');
Route::post('/guardian/login', [GuardianAuthController::class, 'handleLogin'])
    ->name('guardian.handleLogin');
Route::get('/guardian/profile', [GuardianAuthController::class, 'profile'])
    ->name('guardian.profile')
    ->middleware("auth:webguardian");

// ! Teacher Routes

// Route::get('/teacher', [TeacherHomeworkController::class, 'index'])
//     ->name('teacher.home')
//     ->middleware("auth:webteacher");
Route::get('/teacher/login', [TeacherAuthController::class, 'login'])
    ->name('teacher.login');
Route::get('/teacher/logout', [TeacherAuthController::class, 'logout'])
    ->name('teacher.logout');
Route::post('/teacher/login', [TeacherAuthController::class, 'handleLogin'])
    ->name('teacher.handleLogin');

Route::get('/teacher', [TeacherHomeworkController::class, 'index'])
    ->name('teacher.home')
    ->middleware("auth:webteacher");
Route::get('/teacher/profile/{id}', [TeacherHomeworkController::class, 'profile'])
    ->name('teacher.profile')
    ->middleware("auth:webteacher");
Route::get('/teacher/studentspage', [TeacherHomeworkController::class, 'studentspage'])
    ->name('teacher.studentspage')
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
// Route::post('/teacher/{id}', [TeacherHomeworkController::class, 'destroy'])
//     ->name('teacher.deletefile')
//     ->middleware("auth:webteacher");
Route::get('/teacher/studenthomework', [TeacherCorrectController::class, 'studenthomework'])
    ->name('teacher.student.homework')
    ->middleware("auth:webteacher");
Route::get('/teacher/correctpage/{id}/{user_id}', [TeacherCorrectController::class, 'correctuploadepage'])
    ->name('teacher.correct.uploadpage')
    ->middleware("auth:webteacher");
Route::post('/teacher/uploadteachercorrect', [TeacherCorrectController::class, 'uploadteachercorrect'])
    ->name('teacher.uploadteachercorrect')
    ->middleware("auth:webteacher");
Route::get('/teacher/viewstudenthomework/{id}', [TeacherCorrectController::class, 'viewstudenthomework'])
    ->name('teacher.viewstudenthomework')
    ->middleware("auth:webteacher");
Route::get('/teacher/downloadstudenthomework/{file}', [TeacherCorrectController::class, 'downloadstudenthomework'])
    ->name('teacher.downloadstudenthomework')
    ->middleware("auth:webteacher");
Route::get('/teacher/viewassignmenthomeworkcorrect/{id}', [TeacherCorrectController::class, 'viewassignmenthomeworkcorrect'])
    ->name('teacher.viewassignmenthomeworkcorrect')
    ->middleware("auth:webteacher");

// ! Teacher Cours Routes

Route::get('/teacher/cours', [TeacherCoursController::class, 'index'])
    ->name('teacher.cours')
    ->middleware("auth:webteacher");
Route::get('/teacher/cours/uploadpage', [TeacherCoursController::class, 'uploadpage'])
    ->name('teacher.cours.uploadpage')
    ->middleware("auth:webteacher");
Route::post('/teacher/cours/uploadfile', [TeacherCoursController::class, 'store'])
    ->name('teacher.cours.uploadfile')
    ->middleware("auth:webteacher");
Route::get('teacher/cours/{id}/edit', [TeacherCoursController::class, 'edit'])
    ->name('teacher.cours.edit')
    ->middleware("auth:webteacher");
Route::post('teacher/cours/updatefile', [TeacherCoursController::class, 'update'])
    ->name('teacher.cours.updatefile')
    ->middleware("auth:webteacher");
Route::post('teacher/cours/{id}', [TeacherCoursController::class, 'destroy'])
    ->name('teacher.cours.deletefile')
    ->middleware("auth:webteacher");
    
// ! Manager Routes

Route::get('/manager/login', [ManagerAuthController::class, 'login'])
    ->name('manager.login');
Route::get('/manager/logout', [ManagerAuthController::class, 'logout'])
    ->name('manager.logout');
Route::post('/manager/login', [ManagerAuthController::class, 'handleLogin'])
    ->name('manager.handleLogin');

Route::get('/manager', [ManagerController::class, 'index'])
    ->name('manager.home')
    ->middleware("auth:webmanager");
Route::get('manager/addstudent', [ManagerController::class, 'addStudent'])
    ->name('manager.addstudent')
    ->middleware("auth:webmanager");
Route::post('manager/uploadstudent', [ManagerController::class, 'uploadStudent'])
    ->name('manager.uploadstudent')
    ->middleware("auth:webmanager");
Route::get('manager/addguardian', [ManagerController::class, 'addGuardian'])
    ->name('manager.addguardian')
    ->middleware("auth:webmanager");
Route::post('manager/uploaguardian', [ManagerController::class, 'uploadGuardian'])
    ->name('manager.uploadguardian')
    ->middleware("auth:webmanager");
Route::get('manager/addteacher', [ManagerController::class, 'addTeacher'])
    ->name('manager.addteacher')
    ->middleware("auth:webmanager");
Route::post('manager/uploadteacher', [ManagerController::class, 'uploadTeacher'])
    ->name('manager.uploadteacher')
    ->middleware("auth:webmanager");
Route::get('manager/addmanager', [ManagerController::class, 'addManager'])
    ->name('manager.addmanager')
    ->middleware("auth:webmanager");
Route::post('manager/uploadmanager', [ManagerController::class, 'uploadManager'])
    ->name('manager.uploadmanager')
    ->middleware("auth:webmanager");
Route::get('manager/profile', [ManagerController::class, 'profile'])
    ->name('manager.profile')
    ->middleware("auth:webmanager");