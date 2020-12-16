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

//Route::get('/', function () {
//    $tasks = array (
//        array(
//            'id' => 1,
//            'name' => 'Sleep at 10.00pm',
//            'description' => "Some quick example text to build on the
//            card title and make up the bulk of the card's content.",
//            'order' => 1,
//            'end_time' => '10th August, 2021',
//        ),
//        array(
//            'id' => 2,
//            'name' => 'Wake up at 7.00am',
//            'description' => "Some quick example text to build on the
//            card title and make up the bulk of the card's content.",
//            'order' => 2,
//            'end_time' => '11th August, 2021',
//        ),
//        array(
//            'id' => 3,
//            'name' => 'Go to school at 10.00am',
//            'description' => "Some quick example text to build on the
//            card title and make up the bulk of the card's content.",
//            'order' => 3,
//            'end_time' => '9th August, 2021',
//        ),
//    );
//    return view('welcome', compact('tasks'));
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
