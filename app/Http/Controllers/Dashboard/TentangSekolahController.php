<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TentangSekolahController extends Controller
{
    protected $tentang;

    public function __construct()
    {
        $this->tentang = Sekolah::where('key', 'tentang_sekolah')
            ->pluck('value', 'key')
            ->toArray();
    }

    public function index()
    {
        $mading = [
            'title'    => 'PRESTASI SEKOLAH',
            'kategori' => 'prestasi',
            'list'     => Prestasi::with('penulis')
                ->where('status', '1')
                ->latest()
                ->limit(4)
                ->get(),
        ];
            
        return Inertia::render('ProfilSekolah')
            ->with([
                'tentang' => $this->tentang['tentang_sekolah'],
                'mading'  => $mading,
            ]);
    }

    public function edit()
    {
        return view('dashboard.cms.tentang.edit')
            ->with([
                'title'     => 'Tentang Sekolah',
                'active'    => 'Sekolah',
                'subActive' => 'Tentang',
                'tentang'   => $this->tentang,
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'tentang_sekolah' => ['required'],
        ]);

        $value = $request->input('tentang_sekolah');

        try {
            Sekolah::where('key', 'tentang_sekolah')->update(['value' => $value]);

            toast('Tentang Sekolah berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Tentang Sekolah gagal diperbarui.', 'warning');
        }

        return redirect()->back();
    }
}
