<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware('auth')->group(function () {
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/features/create', [FeatureController::class, 'create'])->name('features.create');
    Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
    Route::get('/features/{feature}/edit', [FeatureController::class, 'edit'])->name('features.edit');
    Route::put('/features/{feature}', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('/features/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');

    Route::get('/role-permissions', [RolePermissionController::class, 'index'])->name('role_permissions.index');
    Route::get('/role-permissions/create', [RolePermissionController::class, 'create'])->name('role_permissions.create');
    Route::post('/role-permissions', [RolePermissionController::class, 'store'])->name('role_permissions.store');
    Route::get('/role-permissions/{rolePermission}/edit', [RolePermissionController::class, 'edit'])->name('role_permissions.edit');
    Route::put('/role-permissions/{rolePermission}', [RolePermissionController::class, 'update'])->name('role_permissions.update');
    Route::delete('/role-permissions/{rolePermission}', [RolePermissionController::class, 'destroy'])->name('role_permissions.destroy');

    Route::get('assign-role', [AdminUserController::class, 'showAssignRolePage'])->name('assignRolePage');
    Route::put('assign-role', [AdminUserController::class, 'assignRole'])->name('assignRole');
    Route::post('/logout', [AdminUserController::class, 'logout'])->name('logout');
});

Route::get('/login', [AdminUserController::class, 'showLoginForm'])->name('login');


Route::get('/register', [AdminUserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AdminUserController::class, 'register']);
Route::get('/login', [AdminUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminUserController::class, 'login']);
Route::post('/logout', [AdminUserController::class, 'logout'])->name('logout');
