<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::post('/books/{id}/rate', [BookController::class, 'rateBook']);
Route::post('/books/{book}/comments', [BookController::class, 'storeComment'])->name('books.comments.store')->middleware('auth');
Route::post('/books/add', [BookController::class, 'store'])->name('books.add');

Auth::routes();
