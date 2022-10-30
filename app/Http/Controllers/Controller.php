<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Part;
use App\Models\LibParts;
use App\Models\PostCategories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\RequestStack;

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
     * BOOKS
     * ================================================================================================================================================================== 
     */

    /**
     * Function List of All Books
     */
    public function getBooks()
    {
        $post = Post::get();
        $user = User::get();
        $category = Category::join('post_categories', 'lib_categories.id', '=', 'post_categories.category_id')->get();
        $parts = Part::join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->get();
        return view('pages/list-book', compact('post', 'category', 'user', 'parts'));
    }

    /**
     * Function Detail of the Book
     */
    public function getBook($slug)
    {
        $post = Post::where('slug', 'like', $slug)->get()[0];
        $post_id = DB::table('posts_parts')->join('lib_post', 'posts_parts.post_id', 'lib_post.id')->where('post_id', $post->id)->get();
        $post_users = Post::where('slug', 'like', $slug)->join('lib_users', 'lib_users.id', 'lib_post.created_by')->get()[0];
        $post_categories = Post::join('post_categories', 'lib_post.id', 'post_categories.post_id')
            ->select('post_categories.*')
            ->where('post_id', $post->id)
            ->get();
        $category = Category::get();
        $parts = Part::join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->where('post_id', $post->id)->get();

        foreach ($parts as $part) {
            $parts_title[] = Str::limit($part->title, 60);
        }

        return view('pages/detail-book', compact('post', 'post_categories', 'category', 'parts', 'post_users', 'parts_title'));
    }

    public function addBooks()
    {
        $category = Category::get();
        return view('pages/add-book', compact('category'));
    }

    public function storeBook(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        // validated
        $validated = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Request input form
        $data = [
            'title'      => $request->title,
            'desc'       => $request->desc,
            'slug'       => $request->slug,
            'paid'       => $request->paid,
            'created_by' => $request->created_by,
            'isShowed'   => $request->isShowed,
            'image'      => $request->file('image'),
        ];

        // Generated unique slug
        // -----------------------------------------------------
        $slug = hexdec(uniqid()) . '-' . $data['slug'];

        // if validated do next
        if ($validated) {
            // File handling here
            $image           = $slug . '.' . $request->file('image')->getClientOriginalExtension();
            $data['image']->move(public_path('/assets/images/cover/' . $slug . '/'), $image);
            $imageUpload     = '/assets/images/cover/' . $slug . '/' . $image;

            // Homework! Iterartion for input Category | Yeay Done!
            $category = [];
            $i = 1;
            $length = count(Category::get());
            for ($i = 1; $i <= $length; $i++) {
                $category[$i] =  $request->$i;
            }

            // Insert to 'lib_post' table
            Post::insert([
                'title'       => $data['title'],
                'description' => $data['desc'],
                'slug'        => $slug,
                'paid'        => $data['paid'],
                'created_by'  => $data['created_by'],
                'isShowed'    => $data['isShowed'],
                'created_at'  => date('Y-m-d H:i:s'),
                'image'       => $imageUpload,
            ]);

            // get new post_id for insert category
            $post = Post::where('slug', $slug)->where('created_by', $data['created_by'])->where('description', $data['desc'])->get()[0];
            $post_id = $post->id;
            foreach ($category as $c) {
                // To Do: insert categories of new book to 'posts_categories' table
                if ($c != null) {
                    DB::table('post_categories')->insert([
                        'post_id' => $post_id,
                        'category_id' => $c,
                    ]);
                }
            }
            // go back to library with success message
            return redirect(route('books'))->with('success', 'Post Successfully added');
        }
    }

    public function updatedBooks(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");

        // Request input form
        $posted = Post::where('id', $id)->get()[0];
        $data = [
            'title'      => $request->title,
            'desc'       => $request->desc,
            'slug'       => $request->slug,
            'paid'       => $request->paid,
            'created_by' => $request->created_by,
            'isShowed'   => $request->isShowed,
            'image'      => $request->file('image'),
        ];

        // validated slug
        // -----------------------------------------------------
        if ($data['slug'] != $posted->slug) {
            $slug = hexdec(uniqid()) . '-' . $data['slug'];
        }
        $slug = $posted->slug;

        // File handling 
        // -----------------------------------------------------

        // update data post
        Post::where('id', $posted->id)->update([
            'title'         => $data['title'],
            'slug'          => $slug,
            'description'   => $data['desc'],
            'isShowed'      => $data['isShowed'],
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        // Homework! Iterartion for request Category input | Yeay Done!
        $category = [];
        $i = 1;
        $length = count(Category::get());
        for ($i = 1; $i <= $length; $i++) {
            $category[$i] =  $request->$i;
        }
        // delete old categories
        $post_category = PostCategories::get();
        foreach ($post_category as $pc) {
            $pc->where('post_id', $posted->id)->delete();
        }
        // replace categories
        foreach ($category as $c) {
            // To Do: insert categories of new book to 'posts_categories' table
            if ($c != null) {
                PostCategories::insert([
                    'post_id' => $posted->id,
                    'category_id' => $c,
                ]);
            }
        }
        return redirect(route('books-detail', ['slug' => $slug]))->with('success', 'Books successfully updated');
    }

    public function destroyBooks($id)
    {
        $post = Post::where('id', $id)->get()[0];
        $post_parts = Part::where('post_id', $post->id)->get();
        if ($post_parts) {
            foreach ($post_parts as $part) {
                LibParts::where('id', $part->id)->get()[0]->delete();
                $part->post_id->delete();
            }
        }
        $post_category = PostCategories::get();
        foreach ($post_category as $pc) {
            $pc->where('post_id', $id)->delete();
        }

        $post->delete();
        return redirect(route('books'))->with('success', 'Books Success Delete');
    }

    /** 
     * PARTS
     * ================================================================================================================================================================== 
     */
    public function getPart($id)
    {
        $post_part = Part::where('parts_id', $id);
        $post = $post_part->join('lib_post', 'posts_parts.post_id', 'lib_post.id')->get()[0];

        $parts = $post_part->join('lib_parts', 'lib_parts.id', 'posts_parts.parts_id')->get()[0];
        if ($post->created_by != session()->get('id')) {
            return redirect(route('books'))->with('message', 'You have not permission to edit part this book');
        }
        // dd($parts);
        return view('pages/part', compact('parts'));
    }

    public function addParts($slug)
    {
        // get the post id whose post will be added parts
        $post = Post::where('slug', $slug)->get()[0];
        if ($post->created_by != session()->get('id')) {
            return redirect(route('books'))->with('message', 'You have not permission to add part this book');
        }
        return view('pages/add-part', compact('post'));
    }

    public function storeParts(Request $request)
    {
        $data = [
            'slug' => $request->slug,
            'title' => $request->title,
            'content' => $request->content,
        ];
        // $slug = hexdec(uniqid()) . '.' . $data['slug'];
        $post = Post::where('slug', $data['slug'])->get()[0];
        DB::table('lib_parts')->insert([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        $part = LibParts::where('title', $data['title'])->where('content', $data['content'])->get()[0];
        $part_id = $part->id;

        Part::insert([
            'post_id' => $post->id,
            'parts_id' => $part_id,
        ]);

        return redirect(route('books-detail', ['slug' => $post->slug]))->with('success', 'part successfully added');
    }

    public function updatedParts(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        $parts = LibParts::where('id', $id)->get()[0];
        $parts->update([
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
        return redirect(route('part', ['id' => $id]))->with('success', 'Parts Successfully Updated');
    }

    public function destroyParts($id)
    {

        $post_parts = Part::where('parts_id', $id)->get()[0];
        $post = Post::where('id', $post_parts->post_id)->get()[0];
        $lib_parts = LibParts::where('id', $id)->get()[0];

        if ($post->created_by != session()->get('id')) {
            return redirect(route('books'))->with('message', 'You have not permission to delete part this book');
        }
        $post_parts->where('parts_id', $id)->delete();
        $lib_parts->delete();

        return redirect(route('books-detail', ['slug' => $post->slug]))->with('success', 'Parts Success Delete');
    }

    /** 
     * CATEGORIES & TAGS
     * ================================================================================================================================================================== 
     */

    public function getCategories()
    {
        $count = [];
        $categories = Category::get();
        $counts = DB::table('post_categories')->get();
        $i = 1;
        // dd($categories);
        foreach ($categories as $category) {
            $count[] = $counts->where('category_id', $category->id)->whereNotIn('post_id', null);
        }
        // dd($counts);
        return view('pages/categories', compact('categories', 'counts'));
    }

    public function storeCategory(Request $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];

        DB::table('lib_categories')->insert([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);

        return redirect(route('categories'))->with('success', 'New Category successfully added');
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