<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;

Auth::routes(
    ['register' => false]
);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::view('/', 'admin.index')->name('admin.index');

    Route::resource('blog', Admin\BlogController::class);

    Route::group(['prefix' => 'home-page'], function () {
        Route::resource('home-page-slider', Admin\HomePage\SliderController::class);
        Route::resource('home-page-department', Admin\HomePage\DepartmentController::class);
        Route::resource('home-page-comment', Admin\HomePage\CommentController::class);
        Route::resource('home-page-expert', Admin\HomePage\ExpertController::class);

        Route::get('/home-page-speciality', [Admin\HomePage\SpecialityController::class, 'index'])->name('home-page-speciality.index');
        Route::post('/home-page-speciality', [Admin\HomePage\SpecialityController::class, 'store'])->name('home-page-speciality.store');

        Route::get('/home-page-welcome', [Admin\HomePage\WelcomeController::class, 'index'])->name('home-page-welcome.index');
        Route::post('/home-page-welcome', [Admin\HomePage\WelcomeController::class, 'store'])->name('home-page-welcome.store');
    });

    Route::get('/contact', [Admin\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [Admin\ContactController::class, 'store'])->name('contact.store');

    Route::get('/change-password',[Admin\ChangePasswordController::class, 'index'])->name('change_password.index');
    Route::post('/change-password',[Admin\ChangePasswordController::class, 'store'])->name('change_password.store');
});

Route::any('/sendmail', [Controllers\MailController::class])->name('sendmail');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [Controllers\HomePageController::class, 'index'])->name('index');

Route::get('/contact', [Controllers\ContactController::class, 'index'])->name('contact');

Route::get('/blog', [Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/post/{post}', [Controllers\BlogController::class, 'show'])->name('blog.post.show');

Route::get('/departments/{department}', [Controllers\HomePageController::class, 'department'])->name('department.show');
