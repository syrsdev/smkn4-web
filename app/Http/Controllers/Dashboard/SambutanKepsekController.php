<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pendidik;
use App\Models\Sambutan;
use Illuminate\Http\Request;

class SambutanKepsekController extends Controller
{
    public function edit()
    {
        $sambutan = Sambutan::first();

        $guru = Pendidik::orderBy('nama', 'asc')->get();

        return view('dashboard.cms.sambutan.edit')
            ->with([
                'title' => 'Sambutan Kepala Sekolah',
                'active' => 'Sambutan',
                'subActive' => null,
                'sambutan' => $sambutan,
                'guru' => $guru,
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul_sambutan' => 'required',
            'sambutan'       => 'required',
            'kepala_sekolah' => 'required',
        ]);

        $sambutan = [
            'judul'     => $request->input('judul_sambutan'),
            'konten'    => $request->input('sambutan'),
            'id_kepsek' => $request->input('kepala_sekolah'),
        ];

        try {
            Sambutan::first()->update($sambutan);

            toast('Sambutan Kepala Sekolah berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Sambutan Kepala Sekolah gagal diperbarui.', 'warning');
        }

        return redirect()->back();
    }
}
