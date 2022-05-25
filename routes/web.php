<?php

use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
//     return view('welcome');
// });
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerMail', [AuthController::class, 'registerMail'])->name('register-mail');
Route::get('/verifyRegisterMail/{mail_user}/{token}', [AuthController::class, 'verifyRegisterMail'])->name('verify-register-mail');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/login-google', [AuthController::class, 'loginGoogle'])->name('login-google');
Route::get('/google/callback', [AuthController::class, 'callbackGoogle'])->name('callback-google');
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile-information', [ProfileController::class, 'profileInformation'])->name('profile-information');
    Route::post('/profile-information', [ProfileController::class, 'updateProfileInformation'])->name('update-profile-information');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::get('/password-level-two', [ProfileController::class, 'passwordLevel2'])->name('password-level-two');

});

Route::get('test', function () {
return view('admin.slide.index');
});
