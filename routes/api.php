<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\AuthController;
use App\Models\Block;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Routes for custom Authentification
 */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signUp']);

/**
 ** CRUD For the Pages and their Sections
 *  Sections are HTML Text content
 */
Route::get("/pages", [PageController::class, "index"]);
Route::get("/page/{id}", [PageController::class, "show"]);
Route::get("/page/{pageId}/sections", [SectionController::class, "index"]);
Route::get("/section/{slug}", [SectionController::class, "show"]);

/**
 * Authentifications using user API Token via Included Middleware
 */
Route::middleware('auth:api')->post('/pages', [PageController::class, "store"]);
Route::middleware('auth:api')->put("/page/{id}", [PageController::class, "update"]);
Route::middleware('auth:api')->delete("/page/{id}", [PageController::class, "delete"]);

Route::middleware('auth:api')->post("/sections", [SectionController::class, "store"]);
Route::middleware('auth:api')->put("/section/{id}", [SectionController::class, "update"]);
Route::middleware('auth:api')->delete("/section/{id}", [SectionController::class, "delete"]);
