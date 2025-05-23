<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.list');
    Route::post('/permissions/newPermissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/editPermissions/{permissionscode}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/editPermissions/{permissionscode}', [PermissionController::class, 'update'])->name('permissions.put');
});

require __DIR__ . '/auth.php';
