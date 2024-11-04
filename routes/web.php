<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', function () {
    return view('welcome');
});


// Authentication routes
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard
Route::get('/admin', function () {
    return view('admin.dashboard.index', [
        'title' => 'Dashboard',
    ]);
})->middleware('auth')->name('admin/dashboard');

// Group routes with a prefix for users
Route::prefix('admin/manajemen-admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
})->middleware('auth');

//route untuk pengunjung yang sudah login
Route::prefix('admin/categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
})->middleware('auth');


//route untuk crud post
Route::prefix('admin/posts')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('posts.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('posts.create');
    Route::post('/', [CategoryController::class, 'store'])->name('posts.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('posts.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('posts.update');
    Route::delete('/{id}',[CategoryController::class, 'destroy'])->name('posts.destroy');
})->middleware('auth');