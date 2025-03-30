<?php

// use App\Livewire\Explore;

use App\Http\Controllers\UserBookController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {

    //? Settings
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');

    //? Admin
    Route::group([
        'prefix' => 'admin',
        'middleware' => IsAdminMiddleware::class,
        'as' => 'admin.'
    ], function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    });

    //? Books
    Route::group(['prefix' => 'books'], function () {
        Route::get('explore', [UserBookController::class, 'explore'])->name('explore');
        Route::get('search', [UserBookController::class, 'search'])->name('search');
        Route::get('details/{id}', [UserBookController::class, 'view'])->name('book.details');
    });
});

require __DIR__ . '/auth.php';
