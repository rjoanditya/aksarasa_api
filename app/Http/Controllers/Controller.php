<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Part;
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
        $parts = Part::join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->get();
        // dd($parts);
        return view('pages/list-book', compact('post', 'category', 'user', 'parts'));
    }
    public function getPart($id)
    {
        $post_part = Part::where('parts_id', $id);
        $parts = $post_part->join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->get()[0];
        // dd($parts);
        return view('pages/part', compact('parts'));
    }

    /**
     * Function Detail of the Book
     */
    public function getBook($slug)
    {
        // dd($slug);
        $post = Post::where('slug', 'like', $slug)->get()[0];
        $post_users = Post::where('slug', 'like', $slug)->join('lib_users', 'lib_users.id', 'lib_post.created_by')->get()[0];
        $post_categories = Post::join('post_categories', 'lib_post.id', 'post_categories.post_id')
            ->select('post_categories.*')
            ->where('post_id', $post->id)
            ->get();
        $category = Category::get();
        $parts = Part::join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->where('post_id', $post->id)->get();
        // dd($parts);
        return view('pages/detail-book', compact('post', 'post_categories', 'category', 'parts', 'post_users'));
    }

    public function addBooks()
    {
        return view('pages/add-book');
    }
    public function addParts($slug)
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