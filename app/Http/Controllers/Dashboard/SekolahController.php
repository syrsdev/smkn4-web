<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SekolahController extends Controller
{
    protected $sekolah;

    public function __construct()
    {
        $this->sekolah = Sekolah::all()
            ->pluck('value', 'key')
            ->toArray();
    }

    public function edit()
    {
        return view('dashboard.cms.sekolah.edit')
            ->with([
                'title'     => 'Identitas Sekolah',
                'active'    => 'Identitas',
                'subActive' => null,
                'sekolah'   => $this->sekolah,
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'    => ['required'],
            'alamat_sekolah'  => ['required'],
            'sematkan_peta'   => ['required'],
            'fax_sekolah'     => ['required'],
            'telepon_sekolah' => ['required'],
            'email_sekolah'   => ['required'],
        ]);

        try {
            foreach ($request->all() as $key => $value) {
                if (in_array($key, ['logo_sekolah', 'favicon'])) {
                    if ($request->hasFile($key)) {
                        $request->validate([
                            $key => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp'],
                        ]);

                        $file = $request->file($key);
                        $filename = $key . '.' . $file->extension();
                        $file->move(public_path('images'), $filename);

                        $value = '/images/' . $filename;

                        $oldImage = Sekolah::where('key', $key)->value('value');
                        if ($oldImage !== $value && File::exists(public_path($oldImage))) {
                            File::delete(public_path($oldImage));
                        }
                    }
                }

                Sekolah::where('key', $key)->update(['value' => $value]);
            }

            toast('Identitas Sekolah berhasil diperbarui!', 'success');
        } catch (\Exception $e) {
            toast('Identitas Sekolah gagal diperbarui.', 'wanning');
        }

        return redirect()->back();
    }
}
