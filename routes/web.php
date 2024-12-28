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
    //start route teacher
    Route::get('teacher', [AdminController::class, 'index1'])->name('teacher.index');
    Route::get('/teacher/create', [AdminController::class, 'create1'])->name('teacher.create');
    Route::post('/teacher', [AdminController::class, 'store1'])->name('teacher.store');
    Route::get('teacher/{id}/edit', [AdminController::class, 'edit1'])->name('teacher.edit');
    Route::put('teacher/{id}', [AdminController::class, 'update1'])->name('teacher.update');
    Route::delete('teacher/{id}', [AdminController::class, 'destroy1'])->name('teacher.destroy');
    //end route teacher

    //start route student
    Route::get('student', [AdminController::class, 'index2'])->name('student.index');
    Route::get('/student/create', [AdminController::class, 'create2'])->name('student.create');
    Route::post('/student', [AdminController::class, 'store2'])->name('student.store');
    Route::get('student/{id}/edit', [AdminController::class, 'edit2'])->name('student.edit');
    Route::put('student/{id}', [AdminController::class, 'update2'])->name('student.update');
    Route::delete('student/{id}', [AdminController::class, 'destroy2'])->name('student.destroy');
    //end route student

    // start route mapel
    Route::get('mapel', [AdminController::class, 'index3'])->name('mapel.index');
    Route::get('/mapel/create', [AdminController::class, 'create3'])->name('mapel.create');
    Route::post('/mapel', [AdminController::class, 'store3'])->name('mapel.store');
    Route::get('mapel/{id}/edit', [AdminController::class, 'edit3'])->name('mapel.edit');
    Route::put('mapel/{id}', [AdminController::class, 'update3'])->name('mapel.update');
    Route::delete('mapel/{id}', [AdminController::class, 'destroy3'])->name('mapel.destroy');
    // end route mapel

    //start route guru mapel
    Route::get('gumap', [AdminController::class, 'index4'])->name('gumap.index');
    Route::get('/gumap/create', [AdminController::class, 'create4'])->name('gumap.create');
    Route::post('/gumap', [AdminController::class, 'store4'])->name('gumap.store');
    Route::get('gumap/{id}/edit', [AdminController::class, 'edit4'])->name('gumap.edit');
    Route::put('gumap/{id}', [AdminController::class, 'update4'])->name('gumap.update');
    Route::delete('gumap/{id}', [AdminController::class, 'destroy4'])->name('gumap.destroy');
    //end route guru mapel

    //start route kelas
    Route::get('kelas', [AdminController::class, 'index5'])->name('kelas.index');
    Route::get('/kelas/create', [AdminController::class, 'create5'])->name('kelas.create');
    Route::post('/kelas', [AdminController::class, 'store5'])->name('kelas.store');
    Route::get('kelas/{id}/edit', [AdminController::class, 'edit5'])->name('kelas.edit');
    Route::put('kelas/{id}', [AdminController::class, 'update5'])->name('kelas.update');
    Route::delete('kelas/{id}', [AdminController::class, 'destroy5'])->name('kelas.destroy');
    //end route kelas

    //start route wali kelas
    Route::get('walikelas', [AdminController::class, 'index6'])->name('walikelas.index');
    Route::get('/walikelas/create', [AdminController::class, 'create6'])->name('walikelas.create');
    Route::post('/walikelas', [AdminController::class, 'store6'])->name('walikelas.store');
    Route::get('walikelas/{id}/edit', [AdminController::class, 'edit6'])->name('walikelas.edit');
    Route::put('walikelas/{id}', [AdminController::class, 'update6'])->name('walikelas.update');
    Route::delete('walikelas/{id}', [AdminController::class, 'destroy6'])->name('walikelas.destroy');
    //end route wali kelas

    //start route paket
    Route::get('paket', [AdminController::class, 'index7'])->name('paket.index');
    Route::get('/paket/create', [AdminController::class, 'create7'])->name('paket.create');
    Route::post('/paket', [AdminController::class, 'store7'])->name('paket.store');
    Route::get('paket/{id}/edit', [AdminController::class, 'edit7'])->name('paket.edit');
    Route::put('paket/{id}', [AdminController::class, 'update7'])->name('paket.update');
    Route::delete('paket/{id}', [AdminController::class, 'destroy7'])->name('paket.destroy');
    //end route paket
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('guru', [GuruController::class, 'index'])->name('guru.index');

    //start route nilai
    Route::get('nilai', [GuruController::class, 'index1'])->name('nilai.index');
    Route::get('/nilai/create/{mapel_id}', [GuruController::class, 'create1'])->name('nilai.create');
    Route::post('/nilai', [GuruController::class, 'store1'])->name('nilai.store');
    Route::get('nilai/{id}/edit', [GuruController::class, 'edit1'])->name('nilai.edit');
    Route::put('nilai/{id}', [GuruController::class, 'update1'])->name('nilai.update');
    Route::delete('nilai/{id}', [GuruController::class, 'destroy1'])->name('nilai.destroy');
    //end route nilai

    //start route wakel
    Route::get('wakel', [GuruController::class, 'index2'])->name('wakel.index');
    //end route wakel
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
});
