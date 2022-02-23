<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/task', [TaskController::class, 'index'])->name('task');
Route::post('/task', [TaskController::class, 'store'])->name('task-add');
Route::get('/tasklist', [TaskController::class, 'show'])->name('task-list');
Route::get('/tasklist/{id}',[TaskController::class, 'edit'])->name('task-edit');
Route::put('/tasklist/{id}', [TaskController::class, 'update'])->name('task-update');
Route::delete('/tasklist/{id}', [TaskController::class, 'destroy'])->name('task-delete');
Route::put('/taskstatus/{id}', [TaskController::class, 'taskStatus'])->name('status-update');


//category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/categorylist', [CategoryController::class, 'show'])->name('category-list');
Route::get('/category/add', [CategoryController::class, 'create'])->name('create-category');
Route::get('/categorylist/{id}',[CategoryController::class, 'edit'])->name('category-edit');
Route::put('/categorylist/{id}', [CategoryController::class, 'update'])->name('category-update');
Route::post('/category', [CategoryController::class, 'store'])->name('category-add');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category-delete');





require __DIR__.'/auth.php';
