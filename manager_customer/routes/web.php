<?php

use App\Http\Controllers\StudentController;
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

    Route::get('/', [StudentController::class, 'index'])->name('user.list');

    Route::get('/create', [StudentController::class, 'showCreateForm'])->name('user.showCreateForm');

    Route::get('/{id}/delete', [StudentController::class, 'deleteUser'])->name('user.deleteUser');

    Route::get('/update/{id}', [StudentController::class, 'showUpdateForm'])->name('user.showUpdateForm');



});

Route::middleware('CheckAge')->group(function (){

    Route::post('/create', [StudentController::class, 'createUser'])->name('user.createUser');

    Route::post('/update', [StudentController::class, 'updateUser'])->name('user.updateUser');
});
