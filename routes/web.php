<?php

use App\Http\Controllers\pageController;
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

Route::get('/', [pageController::class, 'index']);
Route::post('/', [pageController::class, 'loginAuth']);

Route::get('/admin/user/create', [pageController::class, 'adminCreateUserView']);
Route::post('/admin/user/create', [pageController::class, 'adminCreateUser']);
