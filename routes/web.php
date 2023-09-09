<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('logout', [BackendController::class, 'logOut'])->name('logOut');



    Route::get('/', [BackendController::class, 'index']);


    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');

    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('role/{role}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
});
require __DIR__ . '/auth.php';
