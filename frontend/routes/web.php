<?php

use App\Http\Controllers\Agama57Controller;
use App\Http\Controllers\Auth57Controller;
use App\Http\Controllers\User57Controller;
use App\Http\Controllers\Detaildata57Controller;
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

Route::get('/', function () {
    return view('welcome', [
        'page' => "Home"
    ]);
})->middleware('auth');


// auth
Route::get('/login57', [Auth57Controller::class, 'login'])->name('login');
Route::get('/register57', [Auth57Controller::class, 'register'])->name('auth57.register');
Route::get('/logout57', [Auth57Controller::class, 'logout'])->name('auth57.logout');

Route::post('/login57', [Auth57Controller::class, 'loginP'])->name('auth57.loginP');
Route::post('/register57', [Auth57Controller::class, 'registerP'])->name('auth57.registerP');

Route::middleware('auth')->group(function () {
    // agama
    Route::resource('/agama57', Agama57Controller::class)->middleware('admin');

    // my
    Route::get('/myprofile57', [User57Controller::class, 'myprofile'])->name('user57.myprofile');
    Route::put('/myprofile57/edit/image/{id}', [User57Controller::class, 'editimage'])->name('user57.editimage');
    Route::put('/myprofile57/edit/password/{id}', [User57Controller::class, 'editpassword'])->name('user57.editpassword');

    // user
    Route::resource('/user57', User57Controller::class)->middleware('admin');

    // detail
    Route::resource('/detaildata57', Detaildata57Controller::class);
});
