<?php


use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/about', [BlogController::class, 'about'])->name('about');
    Route::get('/post', [BlogController::class, 'post'])->name('post');
    Route::get('/contact', [BlogController::class, 'contact'])->name('contact');
});

Route::get('/form1', [FormController::class, 'form1'])->name('form1');
Route::post('/form1', [FormController::class, 'form1_data'])->name('form1_data');
//Route::post('/form1/{type}/{age}', [FormController::class, 'form1_data'])->name('form1_data');


Route::get('/user', [FormController::class, 'user'])->name('user');
Route::post('/user', [FormController::class, 'user_data'])->name('user_data');


Route::get('/form2', [FormController::class, 'form2'])->name('form2');
Route::post('/form2', [FormController::class, 'form2_data'])->name('form2_data');

Route::get('/form3', [FormController::class, 'form3'])->name('form3');
Route::post('/form3', [FormController::class, 'form3_data'])->name('form3_data');


//
