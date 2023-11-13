<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostPageController extends Controller
{
    public function index(Request $request, $kategori)
    {
        $search = $request->input('search');

        if (strlen($search)) {
            $recentPost = Post::with('penulis')
                ->where('kategori', $kategori)
                ->latest()
                ->first();

            $allPost = Post::with('penulis')
                ->where('slug', '!=', $recentPost->slug)
                ->where(function ($query) use ($search) {
                    $query->orWhere('judul', 'like', "%$search%")
                        ->orWhere('created_at', 'like', "%$search%")
                        ->orWhereHas('penulis', function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%");
                        });
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $recentPost = Post::with('penulis')
                ->where('kategori', $kategori)
                ->latest()
                ->first();

            $allPost = Post::with('penulis')
                ->where('slug', '!=', $recentPost->slug)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return Inertia::render('Post')->with([
            'recentPost' => $recentPost,
            'allPost' => $allPost,
        ]);
    }
}
