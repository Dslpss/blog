<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'featuredPosts' => Post::with('category')->latest()->take(3)->get(),
            'posts' => Post::with('category')->latest()->skip(3)->take(6)->get(),
            'categories' => Category::withCount('posts')->get(),
            'postsCount' => Post::count(),
            'categoriesCount' => Category::count(),
        ]);
    }
}
