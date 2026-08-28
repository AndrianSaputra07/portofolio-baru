<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// ===============================
// PORTFOLIO UTAMA
// ===============================

Route::get('/', [PortfolioController::class, 'index'])
    ->name('portfolio');


// ===============================
// DASHBOARD REDIRECT
// ===============================

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');


// ===============================
// ADMIN
// ===============================

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        // Projects
        Route::resource('projects', ProjectController::class)
            ->except(['show']);


        // Experiences
        Route::resource('experiences', ExperienceController::class)
            ->except(['show']);


        // Certificates
        Route::resource('certificates', CertificateController::class)
            ->except(['show']);

    });


// ===============================
// PROFILE BREEZE
// ===============================

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// ===============================
// AUTH ROUTES
// ===============================

require __DIR__ . '/auth.php';