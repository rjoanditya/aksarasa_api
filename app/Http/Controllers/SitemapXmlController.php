<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SitemapXmlController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->view('index', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}