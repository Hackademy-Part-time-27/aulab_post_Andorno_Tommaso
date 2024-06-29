<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/',[PublicController::class,'homepage'])->name('homepage');



Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');

Route::get('/careers', [PublicController::class, 'careers'])->name('careers');

Route::post('/careers/submit', [PublicController::class,'careersSubmit'])->name('careers.submit');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class,'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class,'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class,'setWriter'])->name('admin.setWriter');
});

Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/{articles}/accepted', [RevisorController::class, 'acceptedArticle'])->name('revisor.acceptedArticle');
    Route::post('/revisor/{articles}/rejected', [RevisorController::class, 'rejectedArticle'])->name('revisor.rejectedArticle');
    Route::post('/revisor/{articles}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

    Route::post('/article/store', [ArticleController::class,'store'])->name('article.store');
});
