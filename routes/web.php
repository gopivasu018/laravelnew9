<?php

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

Route::get('/', [App\Http\Controllers\NewController::class, 'home']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/profile', function () {
    return view('welcome', ['name' => 'New Laravel Application']);
})->name('profile')->middleware('vpath');

Route::get('/dynamicLink/{data}', function ($data) {
    return view('login', ['name' => $data]);
})->name('dynamicLink');
Auth::routes();

Route::resource('user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
