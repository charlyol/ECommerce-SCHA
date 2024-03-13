<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\AugustinController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SagaController;
use Illuminate\Support\Facades\Route;

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
Route::get('/categories/{name}', [CategoryController::class, 'sort'])->name('categories.sort');
Route::get('/', [CatalogController::class,'index'])->name('home');
Route::get('/welcome', function () {return view('welcome');});

Route::get('/categories/{name}', [CategoryController::class, 'sort'])->name('categories.sort');
Route::get('/find', [CategoryController::class, 'search'])->name('categories.find');
Route::get('/books/{id}',[BookController::class, 'show'])->name('books.show');
Route::get('/book/add',[BookController::class, 'create'])->name('book.add');
Route::get('/sagas/{id}',[SagaController::class, 'index']);
Route::get('/cart', [CartController::class, 'view'])->name('cart');
Route::get('/addToCart/{book}', [AddToCartController::class, 'addToCart'])->name('addToCart');
Route::get('/auth/list',[ListController::class,'edit'])->name('list.edit');
Route::delete('/books/{id}', [BookController::class,'destroy'])->name('books.destroy');
Route::get('/books/{uuid}/edit', [BookController::class,'edit'])->name('books.edit');
Route::get('/find', [CategoryController::class, 'search'])->name('categories.find');
Route::post('/addToCartLong', [AddToCartController::class, 'addToCartLong'])->name('addToCartLong');
Route::get('/{firstName}-{lastName}', [AuthorController::class, 'dataByAuthor'])->name('authorCatalog');
Route::delete('/cart/{bookId}', [CartController::class, 'delete'])->name('deleteCartItem');
Route::put('/books/{id}', [BookController::class,'update'])->name('books.update');


require __DIR__.'/auth.php';
Route::get('/cart/{id}', [CartController::class, 'view']);
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

// section du controller de test d'Augustin
Route::get('/AugustinBricole', [AugustinController::class,'dataByAuthor']);
Route::get('/hello', function () { return view('hello');});


