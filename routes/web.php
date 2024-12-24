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
    Route::get('teacher/{id}/edit', [AdminController::class, 'edit1'])->name('teacher.edit');
    Route::put('teacher/{id}', [AdminController::class, 'update1'])->name('teacher.update');
    Route::delete('teacher/{id}', [AdminController::class, 'destroy1'])->name('teacher.destroy');

    Route::get('student', [AdminController::class, 'index2'])->name('student.index');
    Route::get('/student/create', [AdminController::class, 'create2'])->name('student.create');
    Route::post('/student', [AdminController::class, 'store2'])->name('student.store');
    Route::get('student/{id}/edit', [AdminController::class, 'edit2'])->name('student.edit');
    Route::put('student/{id}', [AdminController::class, 'update2'])->name('student.update');
    Route::delete('student/{id}', [AdminController::class, 'destroy2'])->name('student.destroy');

    // start route mapel
    Route::get('mapel', [AdminController::class, 'index3'])->name('mapel.index');
    Route::get('/mapel/create', [AdminController::class, 'create3'])->name('mapel.create');
    Route::post('/mapel', [AdminController::class, 'store3'])->name('mapel.store');
    Route::get('mapel/{id}/edit', [AdminController::class, 'edit3'])->name('mapel.edit');
    Route::put('mapel/{id}', [AdminController::class, 'update3'])->name('mapel.update');
    Route::delete('mapel/{id}', [AdminController::class, 'destroy3'])->name('mapel.destroy');
    // end route mapel

    // start guru mapel
    Route::get('guru-mapel', [AdminController::class, 'indexGuruMapel'])->name('guru-mapel.index');
    Route::get('/guru-mapel/create', [AdminController::class, 'createGuruMapel'])->name('guru-mapel.create');
    Route::post('/guru-mapel', [AdminController::class, 'storeGuruMapel'])->name('guru-mapel.store');
    Route::get('guru-mapel/{id}/edit', [AdminController::class, 'editGuruMapel'])->name('guru-mapel.edit');
    Route::put('guru-mapel/{id}', [AdminController::class, 'updateGuruMapel'])->name('guru-mapel.update');
    Route::delete('guru-mapel/{id}', [AdminController::class, 'destroyGuruMapel'])->name('guru-mapel.destroy');
    // end guru mapel
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('guru', [GuruController::class, 'index'])->name('guru.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
});
