<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\SectionController;
use App\Http\Middleware\ProfessorMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on the 'professor' column
        return $user->professor ? redirect()->route('admin.landing') : redirect()->route('client.landing');
    }

    return view('auth.login');
})->name('landing');

// Route::get('/register', function () {return view('auth.register');})->name('register');
Route::get('/register', [SectionController::class, 'register'])->name('register');

// ADMIN SIDE
    Route::middleware([ProfessorMiddleware::class])->prefix('admin')->group(function () {
        // Profile
        Route::view('/profile', 'admin.account')->name('admin.profile');

        // Dashboard
        Route::get('/dashboard', [ProfileController::class, 'table'])->name('admin.landing');

        // Sections
        Route::get('/section', [SectionController::class, 'index'])->name('admin.section');
        Route::get('/section/{id}', [ProfileController::class, 'sections'])->name('admin.filtered');
        Route::get('/editsection', [SectionController::class, 'view'])->name('admin.addsec');
        Route::post('/editsection', [SectionController::class, 'storesec'])->name('admin.addsec.store');
        Route::delete('/editsection', [SectionController::class, 'delete'])->name('admin.delsec');

        // Files
        Route::get('/files', [ColumnController::class, 'index'])->name('admin.files');
        Route::post('/files', [ColumnController::class, 'store'])->name('admin.files.store');
        Route::get('/files/edit', [ColumnController::class, 'edit'])->name('admin.files.edit');
        Route::delete('/files/edit', [ColumnController::class, 'delete'])->name('admin.files.delete');
        Route::post('/files/edit', [ColumnController::class, 'update'])->name('admin.files.update');

        Route::post('/update-enrollment', [ProfileController::class, 'updateEnrollment'])->name('update.enrollment');
    });


    
// CLIENT SIDE

    Route::get('/client', [ProfileController::class, 'persoTable'])->name('client.landing');
    
    Route::get('/client/profile', [ProfileController::class, 'account'])->name('client.profile');

    Route::post('/client', [FileController::class, 'upload'])->name('files.upload');



// others

    // password change
        Route::post('/client/profile', [PasswordController::class, 'update'])->middleware('auth')->name('update.password');


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
