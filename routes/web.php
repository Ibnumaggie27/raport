<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman loading
Route::get('/loading', function () {
    return view('loading');
})->name('loading');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('teacher', [AdminController::class, 'index1'])->name('teacher.index');
    Route::get('/teacher/create', [AdminController::class, 'create1'])->name('teacher.create');
    Route::post('/teacher', [AdminController::class, 'store1'])->name('teacher.store');
    Route::get('student', [AdminController::class, 'index2'])->name('student.index');
    Route::get('/student/create', [AdminController::class, 'create2'])->name('student.create');
    Route::post('/student', [AdminController::class, 'store2'])->name('student.store');

    // start route mapel
    Route::get('mapel', [AdminController::class, 'index3'])->name('mapel.index');
    Route::get('/mapel/create', [AdminController::class, 'create3'])->name('mapel.create');
    Route::post('/mapel', [AdminController::class, 'store3'])->name('mapel.store');
    // end route mapel
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('guru', [GuruController::class, 'index'])->name('guru.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
});
