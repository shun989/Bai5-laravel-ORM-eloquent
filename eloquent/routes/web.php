<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StudentController;
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

Route::prefix('customers')->group(function (){

    Route::get('/', [CustomerController::class, 'index'])->name('customers.list');

    Route::get('/create', [CustomerController::class, 'createCustomerForm'])->name('customers.createForm');

    Route::post('/create', [CustomerController::class, 'createCustomer'])->name('customers.createCustomer');
});

//Route::group(['prefix'=>'customers','namespace'=>'/'], function (){
//    Route::get('/', "CustomerController@index")->name('customers.list');
//});

Route::prefix('users')->group(function (){
    Route::get('/', [StudentController::class, 'showUser'])->name('users.list');

    Route::get('/register', [StudentController::class, 'showRegisterForm'])->name('users.registerForm');

    Route::post('/register', [StudentController::class, 'registerUser'])->name('users.register');

    Route::get('/delete/{id}', [StudentController::class, 'deleteUser'])->name('users.delete');

    Route::get('/update/{id}', [StudentController::class, 'updateForm'])->name('users.updateForm');

    Route::post('/update', [StudentController::class, 'updateUser'])->name('users.update');
});

Route::prefix('students')->group(function (){

    Route::get('/',[StudentController::class, 'showStudent'])->name('students.list');

    Route::get('/add_student', [StudentController::class, 'addStudentForm'])->name('students.addStudentForm');

    Route::get('/delete/{id}', [StudentController::class, 'deleteStudent'])->name('students.delete');

    Route::get('/edit_student/{id}', [StudentController::class, 'editStudentForm'])->name('students.editForm');

});

Route::post('check_email', [StudentController::class, 'validationEmail'])->name('students.addStudent');
Route::post('check_email', [StudentController::class, 'validationEmail'])->name('students.update');

Route::middleware('CheckAge')->group(function (){

    Route::post('/add_student', [StudentController::class, 'addStudent'])->name('students.addStudent');

    Route::post('/edit_student', [StudentController::class, 'updateStudent'])->name('students.update');

});
