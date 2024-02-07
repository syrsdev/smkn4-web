<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SubNavbar;
use Illuminate\Http\Request;

class SubNavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subNavbar = SubNavbar::get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Sub Navbar?');

        return view('dashboard.sub-navbar.index')
            ->with([
                'title'     => 'Sub Navbar',
                'active'    => 'SubNavbar',
                'subActive' => null,
                'subNavbar' => $subNavbar,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
        ]);

        try {
            SubNavbar::create([
                'name' => strtoupper($request->input('nama')),
                'url'  => $request->input('link'),
            ]);

            toast('Sub Navbar berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('Sub Navbar gagal dibuat.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubNavbar $subNavbar)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
        ]);

        try {
            $subNavbar->update([
                'name' => strtoupper($request->input('nama')),
                'url'  => $request->input('link'),
            ]);

            toast('Sub Navbar berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Sub Navbar gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubNavbar $subNavbar)
    {
        $subNavbar->delete();

        toast('Sub Navbar berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function update_status(Request $request, SubNavbar $subNavbar)
    {
        $subNavbar->update(['status' => $request->status]);

        return redirect()->back();
    }
}
