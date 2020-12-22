<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/tasks')->group(function() {
    Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])
        ->name('task.create');
    Route::post('/create', [App\Http\Controllers\TaskController::class, 'save'])
        ->name('task.save');
});
