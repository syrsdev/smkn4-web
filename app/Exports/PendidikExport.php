<?php

namespace App\Exports;

use App\Models\Pendidik;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PendidikExport implements FromView
{
    public function view(): View
    {
        $guru = Pendidik::with('mapel')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.pendidik.export')
            ->with(['guru' => $guru]);
    }
}
