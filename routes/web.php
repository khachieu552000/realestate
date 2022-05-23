<?php

use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\AuthController;
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
//     return view('welcome');
// });
Route::get('/registration', [AuthController::class, 'registration'])->name('admin.registration');
Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.postLogin');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');