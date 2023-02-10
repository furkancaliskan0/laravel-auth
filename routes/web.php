<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


// ROUTE HOME :
Route::get('/', [MainController::class, 'home'])
    ->name('home');


// ROUTE LOGGED :
Route::middleware(['auth', 'verified'])
    ->name('logged.')
    ->prefix('logged')
    ->group(function () {
        Route::get('/', [MainController::class, 'logged'])
            ->name('logged');
    });

// ROUTE SHOW :
Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
    ->name('project.show');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        // ROUTE CREATE :
    
        Route::get('/project/create', [MainController::class, 'create'])
            ->name('project.create');
        // ROUTE STORE :
        Route::post('/project/create', [MainController::class, 'store'])
            ->name('project.store');
        // ROUTE EDIT :
    
        Route::get('/project/edit/{project}', [MainController::class, 'edit'])
            ->name('project.edit');

        // ROUTE UPDATE :
        Route::post('/project/edit/{project}', [MainController::class, 'update'])
            ->name('project.update');

        // ROUTE DELETE :
    
        Route::get('/project/delete/{project}', [MainController::class, 'delete'])
            ->name('project.delete');

    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';