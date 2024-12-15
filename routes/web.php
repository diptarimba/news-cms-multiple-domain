<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
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
Route::get('/', [NewsController::class, 'index'])->name('news');
Route::get('/download', [NewsController::class, 'custom_download'])->name('news.form');
Route::post('/download', [NewsController::class, 'download'])->name('news.download');
Route::get('/download-by-code', [NewsController::class, 'downloadByCodeIndex'])->name('news.code.form');
Route::post('/download-by-code', [NewsController::class, 'downloadByCode'])->name('news.code.download');
Route::get('/show', function() {
   return redirect('/');
});
Route::get('/show/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/upload', [ImageController::class, 'upload_image'])->name('image.upload');
// Route::get('/register', function () {
//     return view('page.auth.register');
// })->name('register.index');
Route::get('/reset-password', [LoginRegisterController::class, 'reset_index'])->name('reset_password.index');
Route::post('/reset-password', [LoginRegisterController::class, 'reset_send'])->name('reset_password.send');

Route::get('/change-password/{token}', [LoginRegisterController::class, 'change_password'])->name('change_password.index');
Route::post('/change-password/{token}', [LoginRegisterController::class, 'reset_store'])->name('change_password.store');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login.index');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('login.post');

Route::middleware(['no_auth'])->group(function () {
    Route::get('me', [ProfileController::class, 'index'])->name('profile.me');
    Route::post('{user}/me', [ProfileController::class, 'store'])->name('profile.store');

    Route::prefix('admin')->as('admin.')->middleware(['role:admin', 'auth'])->group(function () {
        Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
        Route::resource('admin', AdminController::class)->parameter('admin', 'user');
        Route::get('content/{content}/duplicate', [ContentController::class, 'duplicate'])->name('content.duplicate');
        Route::resource('content', ContentController::class);
        Route::resource('domain', DomainController::class)->only('index', 'store', 'create', 'destroy');
    });

    Route::get('logout', [LoginRegisterController::class, 'logout'])->name('logout');
});
