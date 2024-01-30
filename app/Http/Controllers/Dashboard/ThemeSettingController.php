<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{
    protected $tema;

    public function __construct()
    {
        $this->tema = Sekolah::whereIn('key', ['warna_primer', 'warna_sekunder', 'warna_aksen', 'font_primer', 'font_sekunder'])
            ->pluck('value', 'key')
            ->toArray();
    }

    public function edit()
    {
        return view('dashboard.cms.tema.edit')
            ->with([
                'title'     => 'Tema Website',
                'active'    => 'Tema',
                'subActive' => null,
                'tema'      => $this->tema,
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            '*'   => ['required']
        ]);

        try {
            foreach ($request->all() as $key => $value) {
                Sekolah::where('key', $key)->update(['value' => $value]);
            }

            toast('Tema Website berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Tema Website gagal diperbarui.', 'warning');
        }

        return redirect()->back();
    }
}
