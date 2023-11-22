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
        $subNavbar = SubNavbar::where('status', '1')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Sub Navbar');

        return view('dashboard.sub-navbar.index')
            ->with([
                'title' => 'Sub Navbar',
                'active' => 'SubNavbar',
                'subActive' => null,
                'subNavbar' => $subNavbar,
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
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        try {
            SubNavbar::create([
                'name' => strtoupper($request->input('name')),
                'url' => $request->input('url'),
            ]);

            toast('Sub Navbar berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Sub Navbar gagal ditambahkan.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SubNavbar $subNavbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubNavbar $subNavbar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubNavbar $subNavbar)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        try {
            $subNavbar->update([
                'name' => strtoupper($request->input('name')),
                'url' => $request->input('url'),
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

        return response()->json(['id' => $subNavbar->id, 'status' => $request->status]);
    }
}
