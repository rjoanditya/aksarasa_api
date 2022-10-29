<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;

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

/**
 * Route Management Books
 * GET
 * /books
 * /books/part/(id)
 * /books/(slug)
 * /books/add
 * 
 * DELETE
 * /books/(id)
 * /books/part/(id)
 * 
 * POST
 * /books
 * /books/part
 * 
 * PUT
 * /books/(id)
 * /books/part/(id)
 */


Route::get('/', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'login'])->name('ak-login');
Route::post('login', [AuthController::class, 'storeLogin'])->name('login');
Route::get('signup', [AuthController::class, 'signup'])->name('ak-signup');
Route::post('signup', [AuthController::class, 'storeSignup'])->name('signup');

Route::group(['middleware' => 'IsLoggedInMiddleware'], function () {
    /**
     * Routes Auth Narrators Dashboard
     * 
     * /ak-narrator
     */
    Route::group(['prefix' => 'ak-admin'], function () {
        Route::get('/', [AuthController::class, 'dashboard']);
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/books', [Controller::class, 'getBooks'])->name('books');

        /**
         * {slug} dari buku
         */
        Route::get('/books/{slug}', [Controller::class, 'getBook'])->name('books-detail');
        Route::get('/add-book', [Controller::class, 'addBooks'])->name('add-book');
        Route::post('/adding-book', [Controller::class, 'storeBook'])->name('adding-book');
        Route::delete('/trash-book/{id}', [Controller::class, 'destroyBooks'])->name('destroyBooks');
        Route::put('/updated/book/{id}', [Controller::class, 'updatedBooks'])->name('updatedBooks');

        /**
         * {id} dari buku
         */
        Route::get('/categories', [Controller::class, 'getCategories'])->name('categories');
        Route::get('/tags', [Controller::class, 'getTags'])->name('tags');
        Route::get('/audio', [Controller::class, 'getAudios'])->name('audio');


        /**
         * {id} dari part
         */
        Route::get('/edit-part/{id}', [Controller::class, 'getPart'])->name('part');
        Route::get('/add-part/{slug}', [Controller::class, 'addParts'])->name('add-part');
        Route::post('/adding-part', [Controller::class, 'storeParts'])->name('adding-part');
        Route::delete('/trash-part/{id}', [Controller::class, 'destroyParts'])->name('destroyParts');
    });
});