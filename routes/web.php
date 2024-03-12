<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SagaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AugustinController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use \App\Http\Controllers\CatalogController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [CatalogController::class,'index'])->name('home');
Route::get('/welcome', function () {return view('welcome');});
Route::get('/books/{id}',[BookController::class, 'show'])->name('books.show');
Route::get('/book/add',[BookController::class, 'create'])->name('book.add');
Route::post('/book/store',[BookController::class, 'store'])->name('book.store');
Route::get('/sagas/{id}',[SagaController::class, 'index']);
Route::get('/cart/{id}', [CartController::class, 'view']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
});

require __DIR__.'/auth.php';

Route::get('/{firstName}-{lastName}', [AuthorController::class, 'dataByAuthor']);
// section du controller de test d'Augustin
Route::get('/AugustinBricole', [AugustinController::class,'dataByAuthor']);
Route::get('/hello', function () { return view('hello');});
Route::get('/footer',[\App\Http\Controllers\CategoryController::class,'index'])->name('components.footer');

