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

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Agenda?');

        return view('dashboard.post.agenda.index')
            ->with([
                'title' => 'Data Agenda',
                'active' => 'Post',
                'subActive' => 'Agenda',
                'agenda' => $agenda,
            ]);
    }

    public function artikel()
    {
        $artikel = Post::with('penulis')
            ->where('kategori', 'artikel')
            ->latest()
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Artikel?');

        return view('dashboard.post.artikel.index')
        ->with([
                'title' => 'Data Artikel',
                'active' => 'Post',
                'subActive' => 'Artikel',
                'artikel' => $artikel,
            ]);
    }

    public function berita()
    {
        $berita = Post::with('penulis')
            ->where('kategori', 'berita')
            ->latest()
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Berita?');

        return view('dashboard.post.berita.index')
            ->with([
                'title' => 'Data Berita',
                'active' => 'Post',
                'subActive' => 'Berita',
                'berita' => $berita,
            ]);
    }

    public function event()
    {
        $event = Post::with('penulis')
            ->where('kategori', 'event')
            ->latest()
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Event?');

        return view('dashboard.post.event.index')
            ->with([
                'title' => 'Data Event',
                'active' => 'Post',
                'subActive' => 'Event',
                'event' => $event,
            ]);
    }
}
