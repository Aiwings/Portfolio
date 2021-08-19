<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);


/*
/ Routes for admin 
/ Redirects to the admin blade
/ The Vue router handles the redirections
*/
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/pages', [AdminController::class, 'index']);
Route::get('/admin/page/{slug}', [AdminController::class, 'index']);
Route::get('/admin/projects', [AdminController::class, 'index']);
Route::get('/admin/projects/{slug}', [AdminController::class, 'index']);