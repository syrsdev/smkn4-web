<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sosmed = SocialMedia::get();

        return view('dashboard.sosmed.index')
            ->with([
                'title'     => 'Sosial Media',
                'active'    => 'Sosmed',
                'subActive' => null,
                'sosmed'    => $sosmed,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $sosmed)
    {
        $request->validate([
            'link' => ['nullable'],
        ]);

        try {
            $sosmed->update([
                'url' => $request->input('link'),
            ]);

            toast('Sosial Media berhasil diedit!', 'success');
        } catch (\Exception $e){
            toast('Sosial Media gagal diedit.', 'warning');    
        }

        return redirect()->back();
    }
}
