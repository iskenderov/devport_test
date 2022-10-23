<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SettingsController;
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

Route::get('/game', [GameController::class, 'index'])
    ->name('game.index')
    ->middleware('isActive');

Route::middleware('auth')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(GameController::class)
            ->name('game.')
            ->prefix('game')
            ->group(function () {
                Route::post('/roll', 'roll')->name('roll');
                Route::post('/history', 'showHistory')->name('history');

            });

        Route::controller(SettingsController::class)
            ->name('settings.')
            ->prefix('settings')
            ->group(function () {
                Route::get('/link', 'generateLink')->name('generate_link');
                Route::post('/deactivate', 'deactivate')->name('deactivate');
                Route::post('/refresh_link', 'refreshLink')->name('refresh_link');
            });
    });

Route::resource('user',UserController::class)
    ->middleware('can:admin')
    ->except('show');




require __DIR__ . '/auth.php';
