<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::controller(IndexController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/index', 'index');

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
    Route::get('/books', 'getBooks');

    // slug (book)
    Route::get('/books/{slug}', 'getBook');
    Route::get('/add-book', 'addBooks');

    // id (book), bukan part
    Route::get('/add-part/{id}', 'addParts');
    Route::get('/categories', 'getCategories');
    Route::get('/tags', 'getTags');
    Route::get('/audio', 'getAudios');
    Route::get('/login', 'login');
});