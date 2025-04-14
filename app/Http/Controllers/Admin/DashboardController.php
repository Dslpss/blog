<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postsCount' => Post::count(),
            'categoriesCount' => Category::count(),
            'recentPosts' => Post::latest()->take(5)->get()
        ]);
    }
}
