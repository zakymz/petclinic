<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::middleware(['auth'])->group(function() {
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::post('/update-user/{id}', [HistoryController::class, 'updateUser'])->name('update.user');
});

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::middleware(['authCheck'])->group(function() {
        Route::prefix('admin')->group(function() {
            Route::get('', [AdminHomeController::class, 'index'])->name('admin.home');

            Route::get('/list', [AdminController::class, 'index'])->name('admin.index');
            Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
            Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
            
            Route::prefix('service')->group(function() {
                Route::get('', [ServiceController::class, 'index'])->name('service.index');
                Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
                Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
                Route::post('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
                Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');

                Route::post('/check', [ServiceController::class, 'checkService'])->name('service.check');
            });

            Route::prefix('doctor')->group(function() {
                Route::get('', [DoctorController::class, 'index'])->name('doctor.index');
                Route::post('/store', [DoctorController::class, 'store'])->name('doctor.store');
                Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
                Route::post('/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
                Route::get('/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');
            });

            Route::prefix('customer')->group(function() {
                Route::get('', [CustomerController::class, 'index'])->name('customer.index');
                Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
                Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
                Route::post('/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
            });

            Route::prefix('pet')->group(function() {
                Route::get('', [PetController::class, 'index'])->name('pet.index');
                Route::post('/store', [PetController::class, 'store'])->name('pet.store');
                Route::get('/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
                Route::post('/update/{id}', [PetController::class, 'update'])->name('pet.update');
                Route::get('/delete/{id}', [PetController::class, 'delete'])->name('pet.delete');

                Route::post('/check', [PetController::class, 'checkPet'])->name('pet.check');
            });

            Route::prefix('order')->group(function() {
                Route::get('', [OrderController::class, 'index'])->name('order.index');
                Route::post('/store', [OrderController::class, 'store'])->name('order.store');
                Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
                Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
                Route::post('/update/{id}', [OrderController::class, 'update'])->name('order.update');
            });
        });
    });
});