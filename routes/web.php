<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
})->name('landing');

Route::get('/register', function () {return view('auth.register');})->name('register');

// ADMIN SIDE

    Route::get('/admin/dashboard', [ProfileController::class, 'table'])->name('admin.landing');

    Route::view('/admin/profile','admin.account')->name('admin.profile');
    
    Route::get('/admin/files', [ColumnController::class, 'index'])->name('admin.files');
    Route::post('/admin/files', [ColumnController::class, 'store'])->name('admin.files.store');

    
// CLIENT SIDE

    Route::get('/client', [ProfileController::class, 'persoTable'])->name('client.landing');
    Route::view('/client/profile','client.account')->name('client.profile');

    Route::post('/client', [FileController::class, 'upload'])->name('files.upload');


    Route::get('/dashboard', function () {
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user is a professor or a student
        return $user->professor == 1
        ? redirect()->route('admin.landing')
        : redirect()->route('client.landing');
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
