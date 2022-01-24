<?php
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
Route::get('/{slug}', [HomeController::class, 'index']);

/*
/ Routes for admin
/ Redirects to the admin blade
/ The Vue router handles the redirections
*/
Route::get('/admin/pages', [HomeController::class, 'admin']);
Route::get('/admin/page/{slug}', [HomeController::class, 'admin']);
Route::get('/admin/projects', [HomeController::class, 'admin']);
Route::get('/admin/projects/{slug}', [HomeController::class, 'admin']);
