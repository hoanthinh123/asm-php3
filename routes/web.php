<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController ;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Client\BookController as ClientBookController;
use App\Http\Controllers\Client\UserController as ClientUserController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
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

// Route::get("/", [BookController::class,"home"])->name("page.home");
// Route::get('/category/{id}',[BookController::class,'list'])->name('page.list');
// Route::get('/books/{id}', [BookController::class, 'detail'])->name('page.detail');
// Route::get('/', function () {
//     return view('client.home');
// })->name('client.home');
Route::get("/", [ClientBookController::class,"home"])->name("client.home");
Route::get("/detail", [ClientBookController::class,"chitiet"])->name("client.detail");
Route::get('/category/{id}',[ClientBookController::class,'list'])->name('client.list');
Route::get('/books/{book}', [ClientBookController::class, 'detail'])->name('client.books.detail');
Route::get('/list-product',[ClientBookController::class,'listProduct'])->name('client.listProduct');



Route::get('/users', [ClientUserController::class, 'index'])->name('client.index');
Route::get('/users/edit/{user}', [ClientUserController::class, 'edit'])->name('client.user.edit');
Route::put('/users/edit/{user}', [ClientUserController::class, 'update'])->name('client.user.update');
Route::get('/users/change-password', [ClientUserController::class, 'showChange'])->name('client.showpassword');
Route::put('/users/change-password', [ClientUserController::class, 'changePassword'])->name('client.changepassword');

//Admin
Route::middleware([Authenticate::class, CheckAuth::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminUserController::class, 'home'])->name('admin.users.home');
        //
        // users
        Route::prefix('/users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/create', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/edit/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/delete/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        });
        //s
        // books
        Route::prefix('/books')->group(function () {
        Route::get('/', [AdminBookController::class, 'index'])->name('admin.books.index');
        Route::get('/create', [AdminBookController::class, 'create'])->name('admin.books.create');
        Route::post('/create', [AdminBookController::class, 'store'])->name('admin.books.store');
        Route::get('/edit/{book}', [AdminBookController::class, 'edit'])->name('admin.books.edit');
        Route::put('/edit/{book}', [AdminBookController::class, 'update'])->name('admin.books.update');
        Route::delete('/delete/{book}', [AdminBookController::class, 'destroy'])->name('admin.books.destroy');
        });
        // Category
        Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/edit/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
        });

    });
});


//Login, register, logout
Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
