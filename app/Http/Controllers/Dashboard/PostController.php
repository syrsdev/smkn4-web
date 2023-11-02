<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = [
            'agenda' => Post::with('penulis')
                ->where(['kategori' => 'agenda', 'status' => '1'])
                ->latest()
                ->limit(3)
                ->get(),
            'artikel' => Post::with('penulis')
                ->where(['kategori' => 'artikel', 'status' => '1'])
                ->latest()
                ->limit(3)
                ->get(),
            'berita' => Post::with('penulis')
                ->where(['kategori' => 'berita', 'status' => '1'])
                ->latest()
                ->limit(3)
                ->get(),
            'event' => Post::with('penulis')
                ->where(['kategori' => 'agenda', 'status' => '1'])
                ->latest()
                ->limit(3)
                ->get(),
        ];

        return view('dashboard.post.index')
            ->with([
                'post' => $post,
                'active' => 'Post',
                'subActive' => '',
                'title' => 'Data Post',
            ]);

        // return response()->json(['data' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create')
            ->with([
                'title' => 'Tambah Post',
                'active' => 'Post',
                'subActive' => ''
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->input('judul'));
        Session::flash('konten', $request->input('konten'));

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'id_penulis' => 'required',
        ]);

        $kategori = $request->input('kategori');
        $judul = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('judul'));
        $slug = strtolower(str_replace(' ', '-', $judul));

        $post = [
            'slug' => $slug,
            'judul' => $request->input('judul'),
            'kategori' => $kategori,
            'konten' => $request->input('konten'),
            'status' => $request->input('status'),
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/' . $kategori), $gambar);

            $post['gambar'] = $gambar;
        }

        try {
            Post::create($post);

            toast(ucfirst($kategori) . ' berhasil dibuat!', 'success');

            return redirect()->route($kategori . '.index');
            // return response()->json(['data' => $post]);
        } catch (\Exception $e) {
            toast(ucfirst($kategori) . ' gagal dibuat.', 'warning');

            return redirect()->back();
            // return response()->json(['message' => 'Post gagal dibuat']);                
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->with('penulis');

        $kategori = $post->kategori;

        $otherPost = Post::with('penulis')
            ->where('kategori', $kategori)
            ->latest()
            ->limit(3)
            ->get();

        $otherPost = $otherPost->filter(function ($item) use ($post) {
            return $item->slug !== $post->slug;
        });

        return view('dashboard.post.detail')
            ->with([
                'title' => 'Detail Post',
                'active' => 'Post',
                'subActive' => '',
                'post' => $post,
                'kategori' => $kategori,
                'otherPost' => $otherPost,
            ]);

        // return response()->json(['data' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit')
            ->with([
                'title' => 'Edit Post',
                'active' => 'Post',
                'subActive' => '',
                'post' => $post,
                'kategori' => $post->kategori,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'id_penulis' => 'required',
        ]);

        $kategori = $request->input('kategori');
        $judul = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('judul'));
        $slug = strtolower(str_replace(' ', '-', $judul));

        $updatedPost = [
            'slug' => $slug,
            'judul' => $request->input('judul'),
            'kategori' => $kategori,
            'konten' => $request->input('konten'),
            'status' => $request->input('status'),
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if ($post->gambar !== 'no-image.jpg') {
                File::delete(public_path('storage/' . $kategori . '/' . $post->gambar));
            }

            $file->move(public_path('storage/' . $kategori), $gambar);

            $updatedPost['gambar'] = $gambar;
        }

        try {
            $post->update($updatedPost);

            toast(ucfirst($kategori) . ' berhasil diedit!', 'success');

            return redirect()->route($kategori . '.index');
            // return response()->json(['post' => $post]);
        } catch (\Exception $e) {
            toast(ucfirst($kategori) . ' gagal diedit!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->gambar !== 'no-image.jpg') {
            File::delete(public_path('storage/' . $post->kategori . '/' . $post->gambar));
        }

        $post->delete();

        toast(ucfirst($post->kategori) . ' berhasil dihapus.', 'success');

        return redirect()->back();
        // return response()->json(['massage' => 'Post berhasil dihapus']);
    }
}
