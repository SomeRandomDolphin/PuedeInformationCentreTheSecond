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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
})->middleware('auth');

Route::get('/students/add', function () {
    return view('students/add');
})->middleware('auth');

Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index'])->middleware('auth');

Route::post('/students/add', [App\Http\Controllers\StudentsController::class, 'create'])->middleware('auth');

Route::post('/students/edit/{id}', [App\Http\Controllers\StudentsController::class, 'edit'])->middleware('auth');

Route::patch('/students/update/{id}', [App\Http\Controllers\StudentsController::class, 'update'])->middleware('auth');

Route::post('/students/delete/{id}', [App\Http\Controllers\StudentsController::class, 'destroy'])->middleware('auth');

Route::get('/students/trash', [App\Http\Controllers\StudentsController::class, 'trashindex'])->middleware('auth');

Route::post('/students/trash/restore/{id}', [App\Http\Controllers\StudentsController::class, 'trashrestore'])->middleware('auth');

Route::post('/students/trash/delete/{id}', [App\Http\Controllers\StudentsController::class, 'trashdestroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
