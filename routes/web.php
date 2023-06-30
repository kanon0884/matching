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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ClubController::class)->group(function(){
    Route::get('/', 'first')->name('first');
    Route::get('/club/create', 'create')->name('create');
    Route::post('/club', 'store')->name('store');
    Route::get('/club/{club}', 'index')->name('index');
    Route::put('/club/{club}', 'update')->name('update');
    Route::get('/club/{club}/edit', 'edit')->name('edit');
    Route::delete('/club/{club}')->name('delete');
});

Route::controller(EventController::class)->group(function(){
    Route::get('/event/create', 'create')->name('create');
    Route::post('club', 'store')->name('store');
    Route::get('/events/search', 'search')->name('search');
    Route::get('/events/search/results', 'results')->name('results');
    Route::get('/events/{event}', 'show')->name('show');
    Route::get('/events/{user}/favorites', 'favorites')->name('favorites');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
