<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {
        return redirect('/login');
    }

    public function index()
    {
        return view('pages/home');
    }
    /**
     * Function List of All Books
     */
    public function getBooks()
    {
        $post = Post::get();
        $user = User::get();
        $category = Category::join('post_categories', 'lib_categories.id', '=', 'post_categories.category_id')->get();

        // dd($category);


        return view('pages/list-book', compact('post', 'category', 'user'));
    }
    public function getPart()
    {
        return view('pages/part');
    }

    /**
     * Function Detail of the Book
     */
    public function getBook($slug)
    {
        // dd($slug);
        $post = Post::where('slug', 'like', $slug)->get()[0];
        $post_categories = Post::get();
        $category = Category::get();
        // dd($post_categories);
        return view('pages/detail-book', compact('post', 'post_categories', 'category'));
    }

    public function addBooks()
    {
        return view('pages/add-book');
    }
    public function addParts($id)
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
    // public function login()
    // {
    //     return view('auth/login');
    // }
}