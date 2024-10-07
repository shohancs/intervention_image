<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Backend\StudentPagesController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'/admin'], function() {
    Route::get('/dashboard', [AdminPagesController::class, 'index'])->name('admin.dashboard');

    // Students Controller
    Route::group(['prefix'=>'/student'], function() {
        Route::get('/manage', [StudentPagesController::class, 'index'])->name('student.manage');
        Route::get('/trashManage', [StudentPagesController::class, 'trashManage'])->name('student.trashManage');
        Route::get('/create', [StudentPagesController::class, 'create'])->name('student.create');
        Route::post('/store', [StudentPagesController::class, 'store'])->name('student.store');
        Route::get('/edit/{id}', [StudentPagesController::class, 'edit'])->name('student.edit');
        Route::post('/update/{id}', [StudentPagesController::class, 'update'])->name('student.update');
        Route::post('/trash/{id}', [StudentPagesController::class, 'trash'])->name('student.trash');
        Route::post('/destroy/{id}', [StudentPagesController::class, 'destroy'])->name('student.destroy');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
