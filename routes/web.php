<?php

use App\Models\Responsibility;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResponsibilityController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('responsibilite')->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
        Route::get('/create', [ResponsibilityController::class, "create"])->name('createresponsability');
        Route::get('/index', [ResponsibilityController::class, "index"])->name("resindex");
        Route::post('/store', [ResponsibilityController::class, 'store'])->name("storeresponsibility");
        Route::get('/show{id}', [ResponsibilityController::class, 'show'])->name("showresponsibility");

    });

    Route::prefix('project')->group(function () {
        Route::get('/create', [ProjectController::class, "create"])->name('createproject');
        Route::get('/index', [ProjectController::class, "index"])->name("indexprojects");
        Route::post('/store', [ProjectController::class, 'store'])->name("storeproject");
    });
    Route::prefix('actions')->group(function () {
        Route::get('/create', [ActionController::class, "create"])->name('creataction');
        Route::get('/index', [ActionController::class, "index"])->name("indexactions");
        Route::post('/store', [ActionController::class, 'store'])->name("storeaction");
    });
});
