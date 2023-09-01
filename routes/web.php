<?php

use App\Http\Controllers\AdminLayoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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


Route::get('/', [WebsiteController::class, 'home']);
Route::get('/about', [WebsiteController::class, 'about']);
Route::get('/contact', [WebsiteController::class, 'contact']);
Route::get('/services', [WebsiteController::class, 'services']);


Route::get('/login', [AuthController::class, 'login']);
Route::post('/user-login', [AuthController::class, 'userLogin']);

Route::get('/teacher-register', [AuthController::class, 'teacherRegister']);
Route::post('/teacher-registration', [AuthController::class, 'registrationTeacher']);

Route::get('/student-register', [AuthController::class, 'studentRegister']);
Route::post('/student-registration', [AuthController::class, 'registrationStudent']);




//authentication & authorization
Route::middleware(['checkLogin'])->group(function () {

    Route::get('admin/dashboard', [AdminLayoutController::class, 'dashboard']);
    Route::get('my/dashboard', [AdminLayoutController::class, 'dashboard']);
    Route::get('admin/tables', [AdminLayoutController::class, 'tables']);
    Route::get('admin/logout', [AuthController::class, 'logout']);



    //maatwebsite/excel
    Route::get('excel', function () {
        return view('importFile');
    });
    Route::get('/export-user', [UserController::class, 'exportUser'])->name('export-user');

    Route::post('/import-user', [UserController::class, 'importUser'])->name('import-user');


    //single payment
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    
    Route::post('/session', [ProductController::class, 'session'])->name('session');
    Route::get('/success', [ProductController::class, 'success'])->name('success');



});


//login with google
Route::get('/google/login', [AuthController::class, 'loginWithGoogle']);
Route::get('admin/google/login/redirect', [AuthController::class, 'loginWithGoogleRedirect']);

//login with facebook
Route::get('/facebook/login', [AuthController::class, 'loginWithFacebook']);
Route::get('admin/facebook/login/redirect', [AuthController::class, 'loginWithFacebookRedirect']);

//login with Linkedin
Route::get('/linkedin/login', [AuthController::class, 'loginWithLinkedin']);
Route::get('admin/linkedin/login/redirect', [AuthController::class, 'loginWithLinkedinRedirect']);