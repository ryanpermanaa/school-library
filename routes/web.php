<?php

// use App\Livewire\Explore;

use App\Http\Controllers\AdminBookController;
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

        Route::controller(AdminBookController::class)
            ->name('kelola-buku.')
            ->group(function () {
                Route::get('/kelola-buku', 'index')->name('index');
                Route::get('/kelola-buku/tambah', 'create')->name('create');
            });
    });

    //? Books
    Route::prefix('buku')
        ->name('book.')
        ->controller(UserBookController::class)
        ->group(function () {
            Route::get('jelajahi', 'explore')->name('explore');
            Route::get('cari', 'search')->name('search');
            Route::get('detail/{id}', 'view')->name('details');
            Route::get('dipinjam', 'borrow')->name('borrow');
            Route::get('disimpan', 'saved')->name('saved');
        });
});

require __DIR__ . '/auth.php';
