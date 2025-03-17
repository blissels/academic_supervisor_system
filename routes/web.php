<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('starter');
});
Route::get('1', function () {
  return view('demo.file1');
});
Route::get('2', [DemoController::class, 'index']);
//  Lecturer Route
Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer-list');
Route::get('/lecturer/create', [LecturerController::class, 'create'])->name('lecturer-create');
Route::post('/lecturer/create', [LecturerController::class, 'store'])->name('lecturer-store');
Route::get('/lecturer/edit/{nik}', [LecturerController::class, 'edit'])->name('lecturer-edit');
Route::put('/lecturer/edit/{nik}', [LecturerController::class, 'update'])->name('lecturer-update');
Route::delete('/lecturer/delete/{nik}', [LecturerController::class, 'destroy'])->name('lecturer-delete');

//  Student Route
Route::get('/student', [StudentController::class, 'index'])->name('student-list');
Route::get('/student/create', [StudentController::class, 'create'])->name('student-create');
Route::post('/student/create', [StudentController::class, 'store'])->name('student-store');
Route::get('/student/edit/{nrp}', [StudentController::class, 'edit'])->name('student-edit');
Route::put('/student/edit/{nrp}', [StudentController::class, 'update'])->name('student-update');
Route::delete('/student/delete/{nrp}', [StudentController::class, 'destroy'])->name('student-delete');
Route::get('/student/detail/{nrp}', [StudentController::class, 'show'])->name('student-detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
