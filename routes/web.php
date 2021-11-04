<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\TagController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticlesController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [ArticlesController::class, 'show'])->name('article');

Route::get('/tag/{slug}', [TagController::class, 'tag'])->name('tag');

Route::post('/likeArticle', [ArticlesController::class, 'like']);
Route::post('/updateViews', [ArticlesController::class, 'updateViews']);
Route::post('/addComment', [ArticlesController::class, 'addComment']);
