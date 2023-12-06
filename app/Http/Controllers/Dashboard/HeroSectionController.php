<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    protected $heroSection;

    public function __construct()
    {
        $this->heroSection = HeroSection::all()
            ->pluck('value', 'key')
            ->toArray();
    }

    public function edit()
    {
        return view('dashboard.cms.hero.edit')
            ->with([
                'title' => 'Hero Konten',
                'active' => 'Hero',
                'subActive' => null,
                'tab' => 'Hero',
                'heroSection' => $this->heroSection,
            ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'welcome' => 'required',
            'deskripsi' => 'required',
        ]);

        foreach ($request->all() as $key => $value) {
            if (in_array($key, ['hero_image'])) {
                if ($request->hasFile($key)) {
                    $request->validate([
                        $key => ['nullable', 'file', 'image', 'mimes:png,jpg,jpeg,gif,svg,webp'],
                    ]);

                    $file = $request->file($key);
                    $heroImage = $key . '.' . $file->extension();
                    $file->move(public_path('images'), $heroImage);

                    $value = '/images/' . $heroImage;

                    $oldImage = HeroSection::where('key', $key)->value('value');
                    if ($oldImage !== $value && File::exists(public_path($oldImage))) {
                        File::delete(public_path($oldImage));
                    }
                }
            }

            HeroSection::where('key', $key)->update(['value' => $value]);
        }

        toast('Hero Konten berhasil diperbarui!', 'success');

        return redirect()->back();
    }
}
