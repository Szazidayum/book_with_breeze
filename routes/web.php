<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\Copy;
use App\Models\Lending;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth.basic'])->group(function () {
    Route::apiResource('/api/copies', CopyController::class);
    Route::apiResource('/api/books', BookController::class);
    Route::apiResource('/api/users', UserController::class);
    Route::apiResource('/api/lendings', LendingController::class);
    //view
    Route::get('/copy/new', [CopyController::class, 'newView']);
    Route::get('/copy/edit/{id}', [CopyController::class, 'editView']);
    Route::get('/copy/list', [CopyController::class, 'listView']);
    Route::get('/copy/new', [LendingController::class, 'newView']);

    //lekérdezés
    Route::get('api/auth_user_copies', [LendingController::class, 'auth_user_copies']);
});

//lending
    Route::middleware( ['admin'])->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::get('api/lendings', [LendingController::class, 'index']);
    Route::get('api/lendings', [LendingController::class, 'store']);
    Route::post('api/books/{id}', [BookController::class, 'show']);
    // Route::get('api/books/{id}', [BookController::class, 'show']);
});
Route::apiResource('/api/copies', CopyController::class);
Route::patch('api/users/password/{id}', [UserController::class, 'updatePassword']);
//
Route::get('api/books/copies/{title}', [BookController::class, 'title_copy']);


require __DIR__.'/auth.php';
