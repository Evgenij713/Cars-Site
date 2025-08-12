<?php

use App\Http\Controllers\Auth\Registration;
use App\Http\Controllers\Auth\Sessions;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Comments;
use App\Http\Controllers\Countries;
use App\Http\Controllers\Tags;
use App\Http\Controllers\Brands;
use App\Http\Middleware\BlockByIp;
use Illuminate\Support\Facades\Route;

/*
Route::get('/cars', [Cars::class, 'index'])->name('cars.index');
Route::get('/cars/create', [Cars::class, 'create'])->name('cars.create');
Route::get('/cars/{car}', [Cars::class, 'show'])->name('cars.show');
Route::post('/cars', [Cars::class, 'store'])->name('cars.store');
Route::get('/cars/{car}/edit', [Cars::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}/edit', [Cars::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [Cars::class, 'destroy'])->name('cars.destroy');
*/

Route::middleware([BlockByIp::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::prefix('/auth')->group(function () {
        Route::controller(Sessions::class)->group(function () {
            Route::middleware('guest')->group(function () {
                Route::get('/login', 'create')->name('login.index');
                Route::post('/login', 'store')->name('login.store');
            });
            Route::post('/logout', 'destroy')->name('login.destroy');
        });
        Route::controller(Registration::class)->group(function () {
            Route::middleware('guest')->group(function () {
                Route::get('/registration', 'create')->name('registration.index');
                Route::post('/registration', 'store')->name('registration.store');
            });
        });
    });

    Route::get('/cars/trash', [Cars::class, 'trash'])->name('cars.trash');
    Route::patch('/cars/trash/{car}', [Cars::class, 'restore'])->name('cars.restore');
    Route::delete('/cars/trash/{car}', [Cars::class, 'forceDelete'])->name('cars.forceDelete');
    Route::resource('cars', Cars::class);
    Route::resource('tags', Tags::class);
    Route::resource('brands', Brands::class);
    Route::resource('countries', Countries::class);
    Route::post('/comments', [Comments::class, 'store'])->name('comments.store');
});
