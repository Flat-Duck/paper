<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PermissionController;
use App\Models\Chat;
use App\Models\User;

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

Route::get('/', function () {
   
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('site/books/{book}', [HomeController::class,'show'])->name('book.view');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('users', UserController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('papers', PaperController::class);
        Route::resource('books', BookController::class);
    });
    
    Route::post('comments/{book}',  [CommentController::class,'store'])->name('comments.store');
    
    Route::get('download/books/{book}', [BookController::class,'download'])->name('book.download');
    Route::get('download/papers/{paper}', [PaperController::class,'download'])->name('paper.download');
    
    
    Route::get('chats/admin', [ChatController::class,'index'])->name('admin.chat.index');
    Route::get('chats/admin/{user}',  [ChatController::class,'show'])->name('admin.chat.show');
    Route::post('chats/admin/{user}',  [ChatController::class,'send'])->name('admin.chat.send');
    
    Route::get('chats', [ChatController::class,'user_index'])->name('user.chat.index');
    Route::post('chats',  [ChatController::class,'user_send'])->name('user.chat.send');
    