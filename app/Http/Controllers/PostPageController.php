<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostPageController extends Controller
{
    public function index(Request $request, Post $post)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');
        $order = $request->input('order');

        if (strlen($search)) {
            $posts = Post::with('penulis')
                ->where('kategori', $kategori)
                ->where('slug', '!=', $post->slug)
                ->where(function ($query) use ($search) {
                    $query->orWhere('judul', 'like', "%$search%")
                        ->orWhere('created_at', 'like', "%$search%")
                        ->orWhereHas('penulis', function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%");
                        });
                })
                ->orderBy('created_at', $order)
                ->get();
        } else {
            $posts = Post::with('penulis')
                ->where('slug', '!=', $post->slug)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return Inertia::render('Post')->with([
            'post' => $post,
            'posts' => $posts,
        ]);
    }
}
