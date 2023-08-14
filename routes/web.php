<?php


use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')->name('blog.')->group(function() {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/about', [BlogController::class, 'about'])->name('about');
    Route::get('/post', [BlogController::class, 'post'])->name('post');
    Route::get('/contact', [BlogController::class, 'contact'])->name('contact');
});

// Route::get('/form', [FormController::class], 'form1')->name('form1');
// Route::post('/form', [FormController::class], 'form1_data')->name('form1_data');



//
