<?php

use App\Http\Controllers\UserAppController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [UserAppController::class, 'index'])
    ->name('dashboard');
Route::post('/apps', [UserAppController::class, 'store']);
Route::patch('/apps/edit/{id}', [UserAppController::class, 'update']);
Route::delete('/apps/destroy/{id}', [UserAppController::class, 'destroy']);
