<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('category')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.form', [
            'categories' => Category::all()
        ]);
    }

    protected function createUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $count = 1;

        while (Post::where('slug', $slug)
                  ->when($id, fn($q) => $q->where('id', '!=', $id))
                  ->exists()) {
            $slug = Str::slug($title) . '-' . $count++;
        }

        return $slug;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'excerpt' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $validated['slug'] = $this->createUniqueSlug($validated['title']);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());
            $file->storeAs('public/posters', $filename);
            $validated['poster'] = $filename;
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post criado com sucesso!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'excerpt' => 'required',
            'category_id' => 'required|exists:categories,id',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $validated['slug'] = $this->createUniqueSlug($validated['title'], $post->id);

        if ($request->hasFile('poster')) {
            $post->deletePoster();
            
            $poster = $request->file('poster');
            $posterName = time() . '.' . $poster->extension();
            $poster->storeAs('', $posterName, 'posters');
            $validated['poster'] = $posterName;
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post atualizado com sucesso!');
    }

    public function destroy(Post $post)
    {
        $post->deletePoster();
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post excluído com sucesso!');
    }
}
