<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Jenssegers\Agent\Agent;

class PrestasiPageController extends Controller
{
    private function getPrestasiData($search, $order, $kategori, $penulis, $prestasi)
    {
        $mading = [
            'title' => 'BERITA SEKOLAH',
            'kategori' => 'berita',
            'list' => Post::with('penulis')
                ->where(['kategori' => 'berita', 'status' => '1'])
                ->latest()
                ->limit(4)
                ->get(),
        ];

        $allPrestasi = Prestasi::with('penulis')
            ->where('status', '1')
            ->orderBy('created_at', $order)
            ->when(strlen($prestasi), function ($query) use ($prestasi) {
                return $query->where('slug', '!=', $prestasi->slug);
            })
            ->when($penulis !== 'all', function ($query) use ($penulis) {
                return $query->whereHas('penulis', function ($query) use ($penulis) {
                    $query->where('slug', $penulis);
                });
            })
            ->when($kategori !== 'all', function ($query) use ($kategori) {
                return $query->where('kategori', $kategori);
            })
            ->when(strlen($search), function ($query) use ($search) {
                return $query->where('judul', 'like', "%$search%")
                    ->orWhere('kategori', 'like', "%$search%")
                    ->orWhere('peserta', 'like', "%$search%")
                    ->orWhereHas('penulis', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            });

        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) {
            $allPrestasi = $allPrestasi->paginate(4);
        } else {
            $allPrestasi = $allPrestasi->paginate(9);
        }

        return compact('mading', 'allPrestasi');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order') === null ? 'desc' : $request->input('order');
        $kategori = $request->input('kategori') === null ? 'all' : $request->input('kategori');
        $penulis = $request->input('penulis') === null ? 'all' : $request->input('penulis');

        $prestasi = Prestasi::with('penulis')
            ->where('status', '1')
            ->latest()
            ->first();

        $getPenulis = User::whereHas('prestasi')
            ->orderBy('name', 'asc')
            ->get();

        $data = $this->getPrestasiData($search, $order, $kategori, $penulis, $prestasi);

        if (strlen($prestasi)) {
            $prestasi->views = $prestasi->views + 1;
            $prestasi->save();
        }

        return Inertia::render('Prestasi')->with(array_merge(['prestasi' => $prestasi, 'penulis' => $getPenulis], $data));
    }

    public function show(Request $request, Prestasi $prestasi)
    {
        $search = $request->input('search');
        $order = $request->input('order') === null ? 'desc' : $request->input('order');
        $kategori = $request->input('kategori') === null ? 'all' : $request->input('kategori');
        $penulis = $request->input('penulis') === null ? 'all' : $request->input('penulis');

        $prestasi = Prestasi::with('penulis')
            ->where('slug', $prestasi->slug)
            ->first();

        $getPenulis = User::whereHas('prestasi')
            ->orderBy('name', 'asc')
            ->get();

        $data = $this->getPrestasiData($search, $order, $kategori, $penulis, $prestasi);

        if (strlen($prestasi)) {
            $prestasi->views = $prestasi->views + 1;
            $prestasi->save();
        }

        return Inertia::render('Prestasi')->with(array_merge(['prestasi' => $prestasi, 'penulis' => $getPenulis], $data));
    }
}
