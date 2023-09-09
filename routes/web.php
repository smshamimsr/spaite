<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    Route::delete('permission/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
});
require __DIR__ . '/auth.php';
