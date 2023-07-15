<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
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

Route::controller(ProfileController::class)->group(function(){
    Route::get('/clubs/{user}', 'show')->name('show');
});


Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

Route::controller(ClubController::class)->group(function(){
    Route::get('/', 'first')->name('first');
    Route::get('/club/create', 'create')->name('create');
    Route::post('/clubs', 'store')->name('store');
    Route::get('/club/{club}/edit', 'edit')->name('edit');
    Route::put('/club/{club}', 'update')->name('update');
});

Route::controller(EventController::class)->group(function(){
    Route::get('/event/create/{club}', 'create')->name('create');
    Route::post('/events/{club}', 'store')->name('store');
    Route::get('/events/{club}/{event}/edit')->name('edit');
    Route::get('/events/search', 'search')->name('search');
    Route::get('/events/search/results', 'results')->name('results');
    Route::get('/events/{event}', 'show')->name('show');
    Route::get('/events/{user}/favorites', 'favorites')->name('favorites');
    Route::delete('/events')->name('delete');
});
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
