<?php

use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Book\DownloadBookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', IndexController::class);
Route::get('index/allBooks', [IndexController::class, 'allBooks'])->name('index.allBooks');
Route::get('index/sortBooks', [IndexController::class, 'sortBooks'])->name('index.sortBooks');
Route::get('index/contact', [IndexController::class, 'contact'])->name('index.contact');
Route::get('index/about', [IndexController::class, 'about'])->name('index.about');
Route::resource('index', IndexController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('AdminAuthor', AdminAuthorController::class);
Route::resource('AdminBook', AdminBookController::class);
Route::resource('AdminGenre', AdminGenreController::class);
Route::resource('AdminUser', AdminUserController::class);

Route::get('search/searchBook', [SearchController::class, 'searchBook'])->name('search.searchBook');
Route::get('search/searchBooksGenre/{genre}', [SearchController::class, 'searchBooksGenre'])->name('search.searchBooksGenre');
Route::get('search/searchAuthor/{initialLetter}', [SearchController::class, 'searchAuthor'])->name('search.searchAuthor');
Route::get('search/searchBooksAuthor/{author}', [SearchController::class, 'searchBooksAuthor'])->name('search.searchBooksAuthor');

Route::resource('search', SearchController::class);


Route::get('user/showProfile', [UserController::class, 'showProfile'])->name('user.showProfile');
Route::resource('user', UserController::class);


Route::get('book/showBook/{book}', [BookController::class, 'showBook'])->name('book.showBook');
Route::post('book/setQualify', [BookController::class, 'setQualify'])->name('book.setQualify');
Route::resource('book', BookController::class);


Route::get('downloadBook/userDownloadBook/{idBook}', [DownloadBookController::class, 'userDownloadBook'])->name('downloadBook.userDownloadBook');


