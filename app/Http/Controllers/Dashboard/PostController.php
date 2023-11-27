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
    public function getPost($kategori)
    {
        $post = Post::with('penulis')
            ->where('kategori', $kategori)
            ->latest()
            ->get();

        return $post;
    }

    public function index($kategori)
    {
        $post = $this->getPost($kategori);

        $total = [
            'agenda' => $this->getPost('agenda')->count(), 
            'artikel' => $this->getPost('artikel')->count(), 
            'berita' => $this->getPost('berita')->count(), 
            'event' => $this->getPost('event')->count(), 
        ];

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data '. ucfirst($kategori) . '?');

        return view('dashboard.post.index')
            ->with([
                'title' => 'Data ' . ucfirst($kategori),
                'active' => 'Post',
                'subActive' => ucfirst($kategori),
                'kategori' => ucfirst($kategori),
                'post' => $post,
                'total' => $total,
            ]);
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
                'subActive' => null,
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
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();
            $file->move(public_path('storage/' . $kategori), $gambar);

            $post['gambar'] = '/storage/' . $kategori . '/' .  $gambar;
        }

        try {
            Post::create($post);

            toast(ucfirst($kategori) . ' berhasil dibuat!', 'success');

            return redirect()->route('post.index', $kategori);
        } catch (\Exception $e) {
            toast(ucfirst($kategori) . ' gagal dibuat.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $kategori = $post->kategori;

        $otherPost = Post::with('penulis')
            ->where('kategori', $kategori)
            ->where('slug', '!=', $post->slug)
            ->latest()
            ->limit(3)
            ->get();

        return view('dashboard.post.detail')
            ->with([
                'title' => 'Detail ' . ucfirst($kategori),
                'active' => 'Post',
                'subActive' => ucfirst($kategori),
                'post' => $post,
                'kategori' => $kategori,
                'otherPost' => $otherPost,
            ]);
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
                'subActive' => ucfirst($post->kategori),
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
            'id_penulis' => $request->input('id_penulis'),
        ];

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => ['nullable', 'file', 'image', 'mimes:png,jpg']
            ]);

            $file = $request->file('gambar');
            $gambar = $slug . '.' . $file->extension();

            if (str_contains($post->gambar, 'no-image-43.png')) {
                File::delete(public_path($post->gambar));
            }

            $file->move(public_path('storage/' . $kategori), $gambar);

            $updatedPost['gambar'] = '/storage/' . $kategori . '/' . $gambar;
        }

        try {
            $post->update($updatedPost);

            toast(ucfirst($kategori) . ' berhasil diedit!', 'success');

            return redirect()->route('post.index', $kategori);
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
        if (str_contains($post->gambar, 'no-image-43.png')) {
            File::delete(public_path($post->gambar));
        }

        $post->delete();

        toast(ucfirst($post->kategori) . ' berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function update_status(Request $request, Post $post)
    {
        $post->update(['status' => $request->status]);

        return response()->json(['slug' => $post->slug, 'status' => $request->status]);
    }

    public function upload_image(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $request->validate([
                    'file' => ['nullable', 'file', 'image', 'mimes:png,jpg']
                ]);
    
                $file = $request->file('file');
                $gambar = 'image-' . uniqid() . '.' . $file->extension();
                $file->move(public_path('storage/image-content'), $gambar);

                $url = '/storage/image-content/' . $gambar;
    
                return response()->json(['location' => $url]);
            }
        } catch (\Exception $e) {
            $errorMessage = 'Terjadi kesalahan: ' . $e->getMessage();

            return redirect()->back()->with('error', $errorMessage);
        }
    }
}
