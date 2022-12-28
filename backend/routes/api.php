<?php

use App\Http\Controllers\Api\Agama57Controller;
use App\Http\Controllers\api\Detaildata57Controller;
use App\Http\Controllers\api\User57Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::resource('/agama57', Agama57Controller::class);

route::resource('/detaildata57', DetailData57Controller::class);

route::resource('/user57', User57Controller::class);
Route::put('/user57/update/image/{id}', [User57Controller::class, 'editimage'])->name('user57.editimage');
Route::put('/user57/update/password/{id}', [User57Controller::class, 'editpassword'])->name('user57.editpassword');

// detail
route::resource('/detaildata57', Detaildata57Controller::class);
