<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

Route::get('/home', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function(){
    return Inertia::render('Home');
});
Route::get('/articles', [ArticleController::class,'index'])->name('article-list');
Route::middleware('auth')->group(function () {
Route::get('/article/create',[ArticleController::class,'create'])->name('article-create');
Route::get('/article/edit/{article}',[ArticleController::class,'edit'])->name('article-edit');
Route::put('/article/update/{article}',[ArticleController::class,'update']);
Route::delete('/article/delete/{article}',[ArticleController::class,'destroy'])->name('articles.destroy');
Route::post('/article',[ArticleController::class, 'store']);
});
Route::get('/article/{article}', [ArticleController::class,'show'])->name('article');
