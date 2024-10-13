<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/detail/{category}/{id}',[HomeController::class, 'show_detail'])->name('detail');
Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/news',[HomeController::class, 'news'])->name('news');

//quản lí categories
//add categories
Route::get('/categories',[CategoryController::class , 'index'])->name('categories');;
Route::get('create_category',[CategoryController::class, 'create'])->name('create');
Route::post('create_category',[CategoryController::class, 'store'])->name('store');
//delete categories
Route::get('/delete_category/{category}',[CategoryController::class, 'destroy'])->name('destroy');
//edit and update categories
Route::get('/edit_categories/{category}',[CategoryController::class, 'edit'])->name('edit');
Route::post('/update_categories/{category}',[CategoryController::class, 'update'])->name('update');

//quản lí bài viết tin tức
//add tin tức
Route::get('/admin/news',[NewsController::class , 'index'])->name('admin_news');;
Route::get('create_news',[NewsController::class, 'create'])->name('create_news');
Route::post('create_news',[NewsController::class, 'store'])->name('store_news');
//delete tin tức
Route::get('/delete_news/{news}',[NewsController::class, 'destroy'])->name('destroy_news');
//edit and update tin tức
Route::get('/edit_news/{news}',[NewsController::class, 'edit'])->name('edit_news');
Route::post('/update_news/{news}',[NewsController::class, 'update'])->name('update_news');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/login',[AuthenticatedSessionController::class, 'create'])->name('login');

Route::post('/logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
