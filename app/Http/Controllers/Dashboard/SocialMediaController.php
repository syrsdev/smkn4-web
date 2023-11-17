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
                'title' => 'Sosial Media',
                'active' => 'Sosmed',
                'subActive' => null,
                'sosmed' => $sosmed,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $sosmed)
    {
        ///
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $sosmed)
    {
        $request->validate([
            'nama' => 'required',
            'url' => 'required',
        ]);

        try {
            $sosmed->update([
                'nama' => $request->input('nama'),
                'url' => $request->input('url'),
            ]);

            toast('Sosial Media berhasil diedit!', 'success');

            return redirect()->route('sosmed.index');
        } catch (\Exception $e){
            toast('Sosial Media gagal diedit.', 'warning');
            
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $sosmed)
    {
        //
    }
}
