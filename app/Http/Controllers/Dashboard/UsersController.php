<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')
            ->withCount(['post', 'prestasi'])
            ->latest()
            ->get();

        $users->each(function ($user) {
            $user->views = [
                'post' => Post::where('id_penulis', $user->id)->sum('views'),
                'prestasi' => Prestasi::where('id_penulis', $user->id)->sum('views'),
            ];
        });

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data User?');

        return view('dashboard.user.index')
            ->with([
                'title' => 'Data User',
                'active' => 'User',
                'subActive' => null,
                'users' => $users,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create')
            ->with([
                'title' => 'Tambah User',
                'active' => 'User',
                'subActive' => null,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->input('name'));
        Session::flash('email', $request->input('email'));

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $name = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('name'));
        $slug = strtolower(str_replace(' ', '-', $name));

        try {
            User::create([
                'slug' => $slug,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'level' => $request->input('level'),
            ]);

            toast('User berhasil dibuat!', 'success');

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            toast('User gagal dibuat!', 'warning');
            
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit')
            ->with([
                'title' => 'Edit User',
                'active' => 'User',
                'subActive' => null,
                'user' => $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
        ]);

        $name = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('name'));
        $slug = strtolower(str_replace(' ', '-', $name));

        try {
            $user->update([
                'slug' => $slug,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level' => $request->input('level'),
            ]);

            toast('User berhasil diedit!', 'success');

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            toast('User gagal diedit!', 'warning');
            
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast('User berhasil dihapus.', 'success');
            
        return redirect()->back();
    }
}
