<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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

Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'event_store']);
Route::get('/events/{event}', [EventController::class, 'show']);
Route::get('/posts', [EventController::class, 'posts']);
Route::get('/posts/events', [EventController::class, 'club_index']);
Route::get('/posts/create', [EventController::class, 'event_create']);
Route::get('/posts/{event}/edit',[EventController::class, 'event_edit']);
Route::put('/events/{event}', [EventController::class, 'event_update']);
Route::delete('/posts/{event}', [EventController::class, 'event_delete']);


