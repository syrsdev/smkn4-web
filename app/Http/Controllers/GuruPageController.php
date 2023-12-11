<?php

namespace App\Http\Controllers;

use App\Models\Pendidik;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuruPageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pegawai = Pendidik::with('mapel')
            ->orderBy('created_at', 'asc')
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
            ->with(['pegawai' => $pegawai]);
    }
}
