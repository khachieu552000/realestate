<?php

use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\NewsController;
use App\Http\Controllers\Web\Admin\SlideController;
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
    Route::get('/password-level-two', [ProfileController::class, 'passwordLevel2'])->name('password-level-two');
    Route::post('/password-level-two', [ProfileController::class, 'setPasswordLevel2'])->name('set-password-level-two');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [ProfileController::class, 'changePasswordLevel1'])->name('change-password-level-one');
    Route::post('/change-password-level-two', [ProfileController::class, 'changePasswordLevel2'])->name('change-password-level-two');
    Route::get('/forgot-password', [ProfileController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/check-password-level-two', [ProfileController::class, 'checkPasswordLevel2'])->name('check-password-level-two');
    Route::get('new-password', [ProfileController::class, 'newPassword'])->name('new-password');
    Route::post('reset-password', [ProfileController::class, 'resetPassword'])->name('reset-password');

    Route::prefix('slide')->group(function () {
        Route::get('/', [SlideController::class, 'index'])->name('slide-index');
        Route::get('add-slide', [SlideController::class, 'showAddSlide'])->name('show-add-slide');
        Route::post('add-slide', [SlideController::class, 'addSlide'])->name('add-slide');
        Route::get('delete/{id_slide}', [SlideController::class, 'delete'])->name('delete');
    });
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news-index');
        Route::get('add-news', [NewsController::class, 'showAddNews'])->name('show-add-news');
        Route::post('add-news', [NewsController::class, 'addNews'])->name('add-news');
        Route::get('update-news/{id_news}', [NewsController::class, 'showUpdateNews'])->name('show-update-news');
        Route::post('update-news/{id_news}', [NewsController::class, 'updateNews'])->name('update-news');
        Route::get('delete/{id_news}',[NewsController::class, 'delete'])->name('delete-news');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category-index');
        Route::get('add-category', [CategoryController::class, 'showAddCategory'])->name('show-add-category');
        Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::get('update-category/{id_category}',[CategoryController::class, 'showUpdateCategory'])->name('show-update-category');
        Route::post('update-category/{id_category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::get('delete-category/{id_category}', [CategoryController::class, 'delete'])->name('delete-category');
    });

});
