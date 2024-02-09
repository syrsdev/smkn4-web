<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'post'     => Post::where('id_penulis', $user->id)->sum('views'),
                'prestasi' => Prestasi::where('id_penulis', $user->id)->sum('views'),
            ];
        });

        confirmDelete('Hapus Data?', 'Yakin ingin hapus User?');

        return view('dashboard.user.index')
            ->with([
                'title'     => 'Kelola User',
                'active'    => 'User',
                'subActive' => null,
                'users'     => $users,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => ['required', 'string', 'unique:users,name', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'level'    => ['required'],
        ]);

        try {
            User::create([
                'slug'     => Str::slug($request->input('nama')),
                'name'     => $request->input('nama'),
                'email'    => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'level'    => $request->input('level'),
            ]);

            toast('User berhasil dibuat!', 'success');
        } catch (\Exception $e) {
            toast('User gagal dibuat.', 'warning');            
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama'     => ['required', 'string', 'unique:users,name,'.$user->id, 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email,'.$user->id, 'max:255'],
            'level'    => ['required'],
        ]);

        try {
            $user->update([
                'slug'  => Str::slug($request->input('nama')),
                'name'  => $request->input('nama'),
                'email' => $request->input('email'),
                'level' => $request->input('level'),
            ]);

            toast('User berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('User gagal diedit.', 'warning');
        }

        return redirect()->back();
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
