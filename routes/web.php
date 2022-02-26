<?php

use App\Models\Responsibility;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResponsibilityController;
use App\Models\Project;

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
        Route::get('/show/{id}', [ResponsibilityController::class, 'show'])->name("showresponsibility");
        Route::delete('/delete/{id}', [ResponsibilityController::class, 'destroy'])->name("deleteresponsibility");
        Route::get('/edit/{id}', [ResponsibilityController::class, 'edit'])->name("editresponsibility");
        Route::put('/update/{id}', [ResponsibilityController::class, 'update'])->name("updateresponsibility");
    });

    Route::prefix('project')->group(function () {
        Route::get('/create', [ProjectController::class, "create"])->name('createproject');
        Route::get('/index', [ProjectController::class, "index"])->name("indexprojects");
        Route::get('/show/{id}', [ProjectController::class, "show"])->name("showproject");
        Route::post('/store', [ProjectController::class, 'store'])->name("storeproject");
        Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name("deleteproject");
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name("editproject");
        Route::put('/update/{id}', [ProjectController::class, 'update'])->name("updateproject");
        Route::get('/search', [ProjectController::class, 'search'])->name("find");
    });

    Route::prefix('actions')->group(function () {
        Route::get('/create', [ActionController::class, "create"])->name('creataction');
        Route::get('/index', [ActionController::class, "index"])->name("indexactions");
        Route::post('/store', [ActionController::class, 'store'])->name("storeaction");
        Route::delete('/delete/{id}', [ActionController::class, 'destroy'])->name("deleteaction");
        Route::get('/edit/{id}', [ActionController::class, 'edit'])->name("editaction");
        Route::put('/update/{id}', [ActionController::class, 'update'])->name("updateaction");
        Route::get('/aujourdhui', [ActionController::class, 'today'])->name("today");
        Route::get('/semaine', [ActionController::class, 'week'])->name("week");
    });
});
