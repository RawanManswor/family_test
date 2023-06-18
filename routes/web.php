<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('families/trashed', [FamilyController::class, 'trashed'])->name('families.trashed');
Route::get('families/search', [FamilyController::class, 'search'])->name('families.search');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Routes for the admin area
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/places', PlaceController::class);
    Route::resource('/families', FamilyController::class);
    Route::get('families/trashed', [FamilyController::class, 'trashed'])->name('families.trashed');
    Route::get('families/search', [FamilyController::class, 'search'])->name('families.search');
});


// Routes for the user area
Route::middleware(['auth', 'isUser'])->group(function () {

    Route::resource('/families', FamilyController::class)->only(['create', 'index']);
});
