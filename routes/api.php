<?php

use App\Http\Controllers\ApiActions\SearchApiController;
use App\Http\Controllers\ApiActions\UserCommentaryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('ApiSearch/book', [SearchApiController::class, 'book'])->name('ApiSearch.book');
Route::get('ApiSearch/author', [SearchApiController::class, 'author'])->name('ApiSearch.author');
Route::get('ApiSearch/genre', [SearchApiController::class, 'genre'])->name('ApiSearch.genre');
Route::get('ApiSearch/user', [SearchApiController::class, 'user'])->name('ApiSearch.user');

Route::get('ApiUserCommentary/editCommentary', [UserCommentaryApiController::class, 'editCommentary'])->name('ApiUserCommentary.editCommentary');
Route::get('ApiUserCommentary/deleteCommentary', [UserCommentaryApiController::class, 'deleteCommentary'])->name('ApiUserCommentary.deleteCommentary');
