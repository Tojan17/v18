<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CourseController;

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


Route::get('/form4', [FormController::class, 'form4'])->name('form4');
Route::post('/form4', [FormController::class, 'form4_data'])->name('form4_data');


Route::get('/contact', [FormController::class, 'contact'])->name('contact');
Route::post('/contact', [FormController::class, 'contact_data'])->name('contact_data');


// Course All Routes

//get all data

// Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
// Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// //create routes
// Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
// Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


// //update routes
// Route::post('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
// Route::post(['put', 'patch'],'/courses/{course}', [CourseController::class, 'update'])->name('courses.update');


// //delete route
// Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

 ///بدلا عن الروابط السابقة سنستخدم ما يلي
Route::get('/courses/trash', [CourseController::class, 'trash'])->name('courses.trash');

Route::get('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');

Route::delete('/courses/{course}/forcedelete', [CourseController::class, 'forcedelete'])->name('courses.forcedelete');

Route::resource('courses', CourseController::class);



//
