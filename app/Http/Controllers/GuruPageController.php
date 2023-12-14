<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuruPageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order') === null ? 'asc' : $request->input('order');
        $bagian = $request->input('bagian') === null ? 'all' : $request->input('bagian');
        $mapel = $request->input('mapel') === null ? 'all' : $request->input('mapel');

        $getMapel = Mapel::orderBy('nama', 'asc')
            ->get();

        $pegawai = Pendidik::with('mapel')
            ->orderBy('nama', $order)
            ->when($bagian !== 'all', function ($query) use ($bagian) {
                return $query->where('bagian', $bagian);
            })
            ->when($mapel !== 'all', function ($query) use ($mapel) {
                return $query->whereHas('mapel', function ($query) use ($mapel) {
                    $query->where('slug', $mapel);
                });
            })
            ->when(strlen($search), function ($query) use ($search) {
                return $query->where('nama', 'like', "%$search%")
                    ->orWhere('bagian', 'like', "%$search%")
                    ->orWhere('sub_bagian', 'like', "%$search%")
                    ->orWhereHas('mapel', function ($query) use ($search) {
                        $query->where('nama', 'like', "%$search%");
                    });
            })
            ->get();

        return Inertia::render('Pegawai')
            ->with([
                'pegawai' => $pegawai,
                'getMapel' => $getMapel,
            ]);
    }
}
