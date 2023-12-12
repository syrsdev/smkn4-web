<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Post;
use App\Models\Prestasi;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $total = [
            'post' => [
                'post' => Post::where('id_penulis', Auth::id())->count(),
                'views' => Post::where('id_penulis', Auth::id())->sum('views'),
            ],
            'prestasi' => [
                'prestasi' => Prestasi::where('id_penulis', Auth::id())->count(),
                'views' => Prestasi::where('id_penulis', Auth::id())->sum('views'),
            ],
        ];

        $post = [
            'totalPost' => $total['post']['post'] + $total['prestasi']['prestasi'],
            'totalViews' => $total['post']['views'] + $total['prestasi']['views'],
            'post' => Post::where('id_penulis', Auth::id())
                ->latest()
                ->limit(4)
                ->get(),
        ];

        return view('profile.index')
            ->with([
                'title' => 'Profile',
                'active' => null,
                'subActive' => null,
                'post' => $post,
            ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        toast('Informasi Profile berhasil diperbarui!', 'success');

        return Redirect::route('profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
