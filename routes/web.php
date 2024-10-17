<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;


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
Route::get('/' , [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register' , [UserController::class, 'showRegister'])->name('register');

Route::get('/profile', [Controller::class, 'profile'])->name('profile');

Route::get('/home', [Controller::class, 'landing'])->name('home');

Route::prefix('/menu')->name('menu.')->group( function () {
    Route::get('/', [MenuController::class, 'index'])->name('index');
    Route::get('/add', [MenuController::class, 'create'])->name('create');
    Route::post('/add', [MenuController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [MenuController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('delete');
});

Route::prefix('/user')->name('users.')->group( function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/add', [UserController::class, 'create'])->name('create');
    Route::post('/add', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});


