<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index", [UserController::class, "index"])->name("index");
Route::get("/create", [UserController::class, "create"])->name("create");
Route::post("/store", [UserController::class, "store"])->name("store");
Route::get("/show/{id}", [UserController::class, "show"])->name("show");
Route::get("/edit/{id}", [UserController::class, "edit"])->name("edit");
Route::post("/update/{id}", [UserController::class, "update"])->name("update");
Route::get("/destroy/{id}", [UserController::class, "destroy"])->name("destroy");
