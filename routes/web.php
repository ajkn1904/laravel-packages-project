<?php

use App\Http\Controllers\AdminLayoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/',[WebsiteController::class, 'home']);
Route::get('/about',[WebsiteController::class, 'about']);
Route::get('/contact',[WebsiteController::class, 'contact']);
Route::get('/services',[WebsiteController::class, 'services']);


Route::get('/login',[AuthController::class, 'login']);
Route::post('/user-login',[AuthController::class, 'userLogin']);

Route::get('/teacher-register',[AuthController::class, 'teacherRegister']);
Route::post('/teacher-regristration',[AuthController::class, 'registrationTeacher']);

Route::get('/student-register',[AuthController::class, 'studentRegister']);
Route::post('/student-regristration',[AuthController::class, 'registrationStudent']);



//maatwebsite/excel
Route::get('excel', function () {
    return view('importFile');
});
Route::get('/export-user', [UserController::class, 'exportUser'])->name('export-user');

Route::post('/import-user', [UserController::class, 'importUser'])->name('import-user');



//authentication & authorization
Route::middleware(['checkLogin'])->group(function () {
    
    Route::get('admin/dashboard',[AdminLayoutController::class, 'dashboard']);
    Route::get('admin/tables',[AdminLayoutController::class, 'tables']);
    Route::get('admin/logout',[AuthController::class, 'logout']);

});