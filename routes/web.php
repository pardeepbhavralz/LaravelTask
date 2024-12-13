<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----------------> My New Routes
Route::get('/user-create', [UserDashboardController::class,'index'])->name('user.add');
Route::post('/create-user', [UserDashboardController::class,'create'])->name('create.user');
Route::get('/dashboard', [UserDashboardController::class,   'show'])->name('dashboard');
Route::delete('/user-delete/{id}', [UserDashboardController::class,   'delete'])->name('user.delete');
Route::get('/edit-user/{id}',[UserDashboardController::class,'edit'])->name('edit.user');

Route::post('/update-user/{id}', [UserDashboardController::class,'update']);









require __DIR__.'/auth.php';
