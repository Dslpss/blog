<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::with('category')->latest()->paginate(9),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post->load('category')
        ]);
    }

    public function byCategory(Category $category)
    {
        return view('posts.index', [
            'posts' => $category->posts()->with('category')->latest()->paginate(9),
            'categories' => Category::all(),
            'currentCategory' => $category
        ]);
    }
}
