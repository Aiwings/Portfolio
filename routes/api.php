<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/pages", [PageController::class, "index"]);
Route::get("/page/{name}", [PageController::class, "show"]);
Route::post("/pages", [PageController::class, "store"]);
Route::put("/page/{name}", [PageController::class, "update"]);
Route::delete("/page/{name}", [PageController::class, "delete"]);
