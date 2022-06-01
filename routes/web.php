<?php

use App\Http\Controllers\Web\Admin\LocationController;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\AuthController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\DirectionsController;
use App\Http\Controllers\Web\Admin\NewsController;
use App\Http\Controllers\Web\Admin\PostTypeController;
use App\Http\Controllers\Web\Admin\PropertyController;
use App\Http\Controllers\Web\Admin\PropertyTypeController;
use App\Http\Controllers\Web\Admin\SlideController;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
// use phpDocumentor\Reflection\Location;
// use Symfony\Component\HttpKernel\Profiler\Profile;

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
        Route::get('/add-slide', [SlideController::class, 'showAddSlide'])->name('show-add-slide');
        Route::post('/add-slide', [SlideController::class, 'addSlide'])->name('add-slide');
        Route::get('/delete/{id_slide}', [SlideController::class, 'delete'])->name('delete');
    });
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news-index');
        Route::get('/add-news', [NewsController::class, 'showAddNews'])->name('show-add-news');
        Route::post('/add-news', [NewsController::class, 'addNews'])->name('add-news');
        Route::get('/update-news/{id_news}', [NewsController::class, 'showUpdateNews'])->name('show-update-news');
        Route::post('/update-news/{id_news}', [NewsController::class, 'updateNews'])->name('update-news');
        Route::get('/delete/{id_news}',[NewsController::class, 'delete'])->name('delete-news');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category-index');
        Route::post('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
        Route::get('/update-category/{id_category}',[CategoryController::class, 'showUpdateCategory'])->name('show-update-category');
        Route::post('/update-category/{id_category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::get('/delete-category/{id_category}', [CategoryController::class, 'delete'])->name('delete-category');
    });

    Route::prefix('location')->group(function () {
        Route::get('/provinces', [LocationController::class, 'listProvinces'])->name('list-provinces');
        Route::get('/add-provinces', [LocationController::class, 'showAddProvinces'])->name('show-add-provinces');
        Route::post('/add-provinces', [LocationController::class, 'addProvinces'])->name('add-provinces');
        Route::get('/update-provinces/{id_provinces}', [LocationController::class, 'showUpdateProvinces'])->name('show-update-province');
        Route::post('/update-provinces/{id_provinces}', [LocationController::class, 'updateProvinces'])->name('update-province');
        Route::get('/delete-provinces/{id_provinces}', [LocationController::class, 'deleteProvinces'])->name('delete-provinces');

        Route::get('/district', [LocationController::class, 'listDistrict'])->name('list-district');
        Route::get('/add-district', [LocationController::class, 'showAddDistrict'])->name('show-add-district');
        Route::post('/add-district', [LocationController::class, 'addDistrict'])->name('add-district');
        Route::get('/update-district/{id_district}', [LocationController::class, 'showUpdateDistrict'])->name('show-update-district');
        Route::post('/update-district/{id_district}',[LocationController::class, 'updateDistrict'])->name('update-district');
        Route::get('/delete-district/{id_district}', [LocationController::class, 'deleteDistrict'])->name('delete-district');

        Route::get('/ward', [LocationController::class, 'listWard'])->name('list-ward');
        Route::get('/add-ward', [LocationController::class, 'showAddWard'])->name('show-add-ward');
        Route::post('/add-ward', [LocationController::class, 'addWard'])->name('add-ward');
        Route::get('/update-ward/{id_ward}', [LocationController::class, 'showUpdateWard'])->name('show-update-ward');
        Route::post('/update-ward/{id_ward}',[LocationController::class, 'updateWard'])->name('update-ward');
        Route::get('/delete-ward/{id_ward}', [LocationController::class, 'deleteWard'])->name('delete-ward');

        Route::get('/street', [LocationController::class, 'listStreet'])->name('list-street');
        Route::get('/add-street', [LocationController::class, 'showAddStreet'])->name('show-add-street');
        Route::post('/add-street', [LocationController::class, 'addStreet'])->name('add-street');
        Route::get('/update-street/{id_street}', [LocationController::class, 'showUpdateStreet'])->name('show-update-street');
        Route::post('/update-street/{id_street}',[LocationController::class, 'updateStreet'])->name('update-street');
        Route::get('/delete-street/{id_street}', [LocationController::class, 'deleteStreet'])->name('delete-street');

        Route::get('/list-detail', [LocationController::class, 'listDetail'])->name('list-detail');
        Route::post('/import-excel', [LocationController::class, 'importLocation'])->name('import-location');
        Route::get('/export-excel', [LocationController::class, 'exportLocation'])->name('export-location');
    });

    Route::prefix('directions')->group(function () {
        Route::get('/',[DirectionsController::class, 'index'])->name('list-directions');
        Route::get('/add-directions', [DirectionsController::class, 'showAddDirections'])->name('show-add-directions');
        Route::post('/add-directions', [DirectionsController::class, 'addDirections'])->name('add-directions');
        Route::get('/update-directions/{id_directions}', [DirectionsController::class, 'showUpdateDirections'])->name('show-update-directions');
        Route::post('/update-directions/{id_directions}', [DirectionsController::class, 'updateDirections'])->name('update-directions');
        Route::get('/delete-directions/{id_directions}', [DirectionsController::class, 'deleteDirections'])->name('delete-directions');
    });

    Route::prefix('post-type')->group(function () {
        Route::get('/',[PostTypeController::class, 'index'])->name('list-post-type');
        Route::get('/add-post-type', [PostTypeController::class, 'showAddPostType'])->name('show-add-post-type');
        Route::post('/add-post-type', [PostTypeController::class, 'addPostType'])->name('add-post-type');
        Route::get('/update-post-type/{id_post_type}', [PostTypeController::class, 'showUpdatePostType'])->name('show-update-post-type');
        Route::post('/update-post-type/{id_post_type}', [PostTypeController::class, 'updatePostType'])->name('update-post-type');
        Route::get('/delete-post-type/{id_post_type}', [PostTypeController::class, 'deletePostType'])->name('delete-post-type');
    });

    Route::prefix('property-type')->group(function () {
        Route::get('/', [PropertyTypeController::class, 'index'])->name('list-property-type');
        Route::post('/add-property-type', [PropertyTypeController::class, 'addPropertyType'])->name('add-property-type');
        Route::get('/update-property-type/{id_property_type}',[PropertyTypeController::class, 'showUpdatePropertyType'])->name('show-update-property-type');
        Route::post('/update-property-type/{id_property_type}', [PropertyTypeController::class, 'updatePropertyType'])->name('update-property-type');
        Route::get('/delete-property-type/{id_property_type}', [PropertyTypeController::class, 'delete'])->name('delete-property-type');
    });

    Route::prefix('property')->group(function () {
        Route::get('/', [PropertyController::class, 'index'])->name('list-property');
        Route::post('/select-delivery', [PropertyController::class,'selectDelivery'])->name('select-delivery');
        Route::get('/add-property', [PropertyController::class, 'showAddProperty'])->name('show-add-property');
        Route::post('/add-property', [PropertyController::class, 'addProperty'])->name('add-property');
    });
});
