<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
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


//Auth
Route::post('/login', [Authcontroller::class, 'login'])->name('auth.login');
Route::get('/login', [Authcontroller::class, 'show'])->name('login');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        //Event and user controllers for admin
        Route::resource('users', UserController::class);
        Route::resource('events', EventController::class);

        //User edit own account password
        Route::get('/account', [UserController::class, 'user_edit'])->name('users.user_edit');
        Route::put('/users_update', [UserController::class, 'user_update'])->name('users.user_update');

        //User edit own games
        Route::get('/myevents', [EventController::class, 'myevents_index'])->name('events.myevents.index');
        Route::get('/myevents/{event}', [EventController::class, 'myevents_edit'])->name('events.myevents.edit');
        Route::put('/myevents/{event}', [EventController::class, 'myevents_update'])->name('events.myevents.update');

        //Edit results
        Route::get('/event/{event}/results/create', [\App\Http\Controllers\ResultController::class, 'create'])->name('results.create');
        Route::post('/event/{event}/results/create', [\App\Http\Controllers\ResultController::class, 'store'])->name('results.store');
        Route::get('/event/{event}/results/edit/{result}', [\App\Http\Controllers\ResultController::class, 'edit'])->name('results.edit');
        Route::put('/event/{event}/results/edit/{result}', [\App\Http\Controllers\ResultController::class, 'update'])->name('results.update');
        Route::delete('/event/{event}/results/edit/{result}', [\App\Http\Controllers\ResultController::class, 'destroy'])->name('results.destroy');

        //Dashboard main page
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('admin.index');
    });
});

Route::fallback(function () {
    return redirect()->route('admin.index');
});

//Games
Route::get(' /pelit/matopeli', function () {
    return view('matopeli');
});
