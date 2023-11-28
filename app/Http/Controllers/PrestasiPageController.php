<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Jenssegers\Agent\Agent;

class PrestasiPageController extends Controller
{
    private function getPrestasiData($search, $prestasi)
    {
        $mading = [
            'title' => 'BERITA SEKOLAH',
            'kategori' => 'berita',
            'list' => Post::with('penulis')
                ->where(['kategori' => 'berita', 'status' => '1'])
                ->limit(4)
                ->get(),
        ];

        $allPrestasi = Prestasi::with('penulis')
            ->where('status', '1')
            ->when(strlen($prestasi), function ($query) use ($prestasi) {
                return $query->where('slug', '!=', $prestasi->slug);
            })
            ->when(strlen($search), function ($query) use ($search) {
                return $query->where('judul', 'like', "%$search%")
                    ->orWhere('kategori', 'like', "%$search%")
                    ->orWhere('pemenang', 'like', "%$search%")
                    ->orWhere('created_at', 'like', "%$search%")
                    ->orWhereHas('penulis', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            })
            ->latest();

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

        $prestasi = Prestasi::with('penulis')
            ->where('status', '1')
            ->latest()
            ->first();

        $data = $this->getPrestasiData($search, $prestasi);

        if (strlen($prestasi)) {
            $prestasi->views = $prestasi->views + 1;
            $prestasi->save();
        }

        return Inertia::render('Prestasi')->with(array_merge(['prestasi' => $prestasi], $data));
    }

    public function show(Request $request, Prestasi $prestasi)
    {
        $search = $request->input('search');

        $prestasi = Prestasi::with('penulis')
            ->where('slug', $prestasi->slug)
            ->first();

        $data = $this->getPrestasiData($search, $prestasi);

        if (strlen($prestasi)) {
            $prestasi->views = $prestasi->views + 1;
            $prestasi->save();
        }

        return Inertia::render('Prestasi')->with(array_merge(['prestasi' => $prestasi], $data));
    }
}
