<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('pages/home');
    }
    /**
     * Function List of All Books
     */
    public function getBooks()
    {
        return view('pages/list-book');
    }

    /**
     * Function Detail of the Book
     */
    public function getBook()
    {
        return view('pages/detail-book');
    }

    public function addBooks()
    {
        return view('pages/add-book');
    }
    public function addParts()
    {
        return view('pages/add-part');
    }
    public function getCategories()
    {
        return view('pages/categories');
    }
    public function getTags()
    {
        return view('pages/tags');
    }
    public function getAudios()
    {
        return view('pages/list-audiobook');
    }
    public function login()
    {
        return view('auth/login');
    }
}