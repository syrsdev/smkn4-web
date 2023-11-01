<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexPostController extends Controller
{
    public function agenda()
    {
        $agenda = Post::with('penulis')
            ->where('kategori', 'agenda')
            ->latest()
            ->get();

        return view('dashboard.post.agenda.index')
            ->with([
                'agenda' => $agenda,
                'active' => 'Post',
                'subActive' => 'Agenda',
                'title' => 'Data Agenda',
            ]);
    }

    public function artikel()
    {
        $artikel = Post::with('penulis')
            ->where('kategori', 'artikel')
            ->latest()
            ->get();

        return view('dashboard.post.artikel.index')
            ->with([
                'artikel' => $artikel,
                'active' => 'Post',
                'subActive' => 'Artikel',
                'title' => 'Data Artikel',
            ]);
    }

    public function berita()
    {
        $berita = Post::with('penulis')
            ->where('kategori', 'berita')
            ->latest()
            ->get();

        return view('dashboard.post.berita.index')
            ->with([
                'berita' => $berita,
                'active' => 'Post',
                'subActive' => 'Berita',
                'title' => 'Data Berita',
            ]);
    }

    public function event()
    {
        $event = Post::with('penulis')
            ->where('kategori', 'event')
            ->latest()
            ->get();

        return view('dashboard.post.event.index')
            ->with([
                'event' => $event,
                'active' => 'Post',
                'subActive' => 'Event',
                'title' => 'Data Event',
            ]);
    }
}
