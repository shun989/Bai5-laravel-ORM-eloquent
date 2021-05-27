<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::prefix('user')->group(function (){

    Route::get('/', [UserController::class, 'index'])->name('user.list');

    Route::get('/create', [UserController::class, 'showCreateForm'])->name('user.showCreateForm');

    Route::get('/{id}/delete', [UserController::class, 'deleteUser'])->name('user.deleteUser');

    Route::get('/update/{id}', [UserController::class, 'showUpdateForm'])->name('user.showUpdateForm');



});

Route::middleware('CheckAge')->group(function (){

    Route::post('/create', [UserController::class, 'createUser'])->name('user.createUser');

    Route::post('/update', [UserController::class, 'updateUser'])->name('user.updateUser');
});
