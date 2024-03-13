<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SagaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AugustinController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use \App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;

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
Route::get('/categories/{name}', [CategoryController::class, 'sort'])->name('categories.sort');
//Route::get('/categories', [CategoryController::class, 'sort'])->name('categories.sort');
Route::get('/find', [CategoryController::class, 'search'])->name('categories.find');
Route::get('/books/{id}',[BookController::class, 'show'])->name('books.show');
Route::get('/book/add',[BookController::class, 'create'])->name('book.add');
Route::post('/book/store',[BookController::class, 'store'])->name('book.store');
Route::get('/sagas/{id}',[SagaController::class, 'index']);
Route::get('/cart', [CartController::class, 'view'])->name('cart');
Route::get('/addToCart/{book}', [AddToCartController::class, 'addToCart'])->name('addToCart');
Route::post('/addToCartLong', [AddToCartController::class, 'addToCartLong'])->name('addToCartLong');
Route::get('/{firstName}-{lastName}', [AuthorController::class, 'dataByAuthor'])->name('authorCatalog');
Route::delete('/cart/{bookId}', [CartController::class, 'delete'])->name('deleteCartItem');
require __DIR__.'/auth.php';
Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'view']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/book/add',[BookController::class, 'create'])->name('book.add');
    Route::post('/book/store',[BookController::class, 'store'])->name('book.store');
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

