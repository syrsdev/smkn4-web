<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Jenssegers\Agent\Agent;

class PostPageController extends Controller
{
    private function getPostData($search, $kategori, $order, $filerKategori, $penulis, $post)
    {
        $mapKategori = [
            'agenda' => ['mading' => 'artikel', 'allPost' => 'artikel'],
            'artikel' => ['mading' => 'berita', 'allPost' => 'berita'],
            'berita' => ['mading' => 'event', 'allPost' => 'event'],
            'event' => ['mading' => 'agenda', 'allPost' => 'agenda'],
        ];

        $kategoriMading = $mapKategori[$kategori]['mading'];
        $kategoriAllPost = $mapKategori[$kategori]['allPost'];

        $mading = [
            'title' => strtoupper($kategoriMading) . ' SEKOLAH',
            'kategori' => $kategoriMading,
            'list' => Post::with('penulis')
                ->where(['kategori' => $kategoriMading, 'status' => '1'])
                ->when(strlen($post), function ($query) use ($post) {
                    return $query->where('slug', '!=', $post->slug);
                })
                ->limit(4)
                ->get(),
        ];

        $allPost = Post::with('penulis')
            ->where('status', '1')
            ->where('kategori', '!=', $kategoriAllPost)
            ->orderBy('created_at', $order)
            ->when(strlen($post), function ($query) use ($post) {
                return $query->where('slug', '!=', $post->slug);
            })
            ->when($penulis !== 'all', function ($query) use ($penulis) {
                return $query->whereHas('penulis', function ($query) use ($penulis) {
                    $query->where('slug', $penulis);
                });
            })
            ->when($filerKategori !== 'all', function ($query) use ($filerKategori) {
                return $query->where('kategori', $filerKategori);
            })
            ->when(strlen($search), function ($query) use ($search) {
                return $query->where('judul', 'like', "%$search%")
                    ->orWhere('kategori', 'like', "%$search%")
                    ->orWhereHas('penulis', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            });

        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) { 
            $allPost = $allPost->paginate(4);
        } else {
            $allPost = $allPost->paginate(9);
        }

        return compact('mading', 'allPost');
    }

    public function index(Request $request, $kategori)
    {
        $search = $request->input('search');
        $order = $request->input('order') === null ? 'asc' : $request->input('order');
        $filerKategori = $request->input('kategori') === null ? 'all' : $request->input('kategori');
        $penulis = $request->input('penulis') === null ? 'all' : $request->input('penulis');
        
        $post = Post::with('penulis')
            ->where(['kategori' => $kategori, 'status' => '1'])
            ->latest()
            ->first();

        $getPenulis = User::whereHas('post')
            ->orderBy('name', 'asc')
            ->get();

        if (strlen($post)) {
            $post->views = $post->views + 1;
            $post->save();
        }

        $data = $this->getPostData($search, $kategori, $order, $filerKategori, $penulis, $post);    

        return Inertia::render('Post')->with(array_merge(['post' => $post, 'penulis' => $getPenulis], $data));
    }

    public function show(Request $request, $kategori, Post $post)
    {
        $search = $request->input('search');
        $order = $request->input('order') === null ? 'asc' : $request->input('order');
        $filerKategori = $request->input('kategori') === null ? 'all' : $request->input('kategori');
        $penulis = $request->input('penulis') === null ? 'all' : $request->input('penulis');

        $post = Post::with('penulis')
            ->where('slug', $post->slug)
            ->first();
        
        $getPenulis = User::whereHas('prestasi')
            ->orderBy('name', 'asc')
            ->get();

        $data = $this->getPostData($search, $kategori, $order, $filerKategori, $penulis, $post);

        if (strlen($post)) {
            $post->views = $post->views + 1;
            $post->save();
        }

        return Inertia::render('Post')->with(array_merge(['post' => $post, 'penulis' => $getPenulis], $data));
    }
}
