<?php

use App\Http\Controllers\WorkEntryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->middleware('guest');

Route::get('/dashboard', function () {
    $user = auth()->user();

    return match ($user?->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'supervisor' => redirect()->route('supervisor.dashboard'),
        default => redirect()->route('employee.dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'management.dashboard')->name('admin.dashboard');
});

Route::middleware(['auth', 'role:supervisor'])->prefix('supervisor')->group(function () {
    Route::view('/dashboard', 'management.dashboard')->name('supervisor.dashboard');
});

Route::middleware(['auth', 'role:admin,supervisor'])->group(function () {
    Route::get('/usermanagement', [UserManagementController::class, 'index'])
        ->name('usermanagement');

    Route::get('/usermanagement/create', [UserManagementController::class, 'create'])
        ->name('usermanagement.create');

    Route::post('/usermanagement', [UserManagementController::class, 'store'])
        ->name('usermanagement.store');

    Route::patch('/usermanagement/{user}/status', [UserManagementController::class, 'toggleStatus'])
        ->name('usermanagement.status');

    Route::delete('/usermanagement/{user}', [UserManagementController::class, 'destroy'])
        ->name('usermanagement.destroy');
});

Route::middleware(['auth', 'role:employee'])->prefix('employee')->group(function () {
    Route::view('/dashboard', 'employee.dashboard')->name('employee.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::resource('work-entries', WorkEntryController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
