<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [BlogsController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create')->middleware('author');
Route::post('/blogs/store', [BlogsController::class, 'store'])->name('blogs.store')->middleware('author');
Route::get('/blogs/trash', [BlogsController::class, 'trash'])->name('blogs.trash')->middleware('admin');
Route::get('/blogs/trash/{id}/restore', [BlogsController::class, 'restore'])->name('blogs.restore')->middleware('admin');
Route::delete('/blogs/trash/{id}/permanent-delete', [BlogsController::class, 'permanentDelete'])->name('blogs.permanent-delete')->middleware('admin');
Route::get('/blogs/{id}', [BlogsController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogsController::class, 'edit'])->name('blogs.edit')->middleware('author');
Route::patch('/blogs/{id}/update', [BlogsController::class, 'update'])->name('blogs.update')->middleware('author');
Route::delete('/blogs/{id}/delete', [BlogsController::class, 'delete'])->name('blogs.delete')->middleware('admin');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/admin/blogs', [AdminController::class, 'blogs'])->name('admin.blogs')->middleware(['auth', 'admin']);
Route::get('/about', [AdminController::class, 'about'])->name('about');
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::Class)->middleware('admin');
Route::get('contact', [MailController::Class, 'contact'])->name('contact');
Route::post('contact/send', [MailController::Class, 'send'])->name('mail.send');
Route::get('/profile', [ProfileController::Class, 'index'])->middleware('auth')->name('profile.index');
Route::get('/profile/{id}', [ProfileController::Class, 'edit'])->middleware('auth')->name('profile.edit');
Route::patch('/profileUpdate', [ProfileController::Class, 'update'])->middleware('auth')->name('profile.update');
Route::delete('/profileDelete', [ProfileController::class, 'destroy'])->middleware('auth')->name('profile.destroy');
