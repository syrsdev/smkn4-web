<?php

namespace App\Exports;

use App\Models\Pendidik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendidikExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendidik::with('mapel')
            ->orderBy('nama', 'asc')
            ->get();
    }

    public function map($guru): array
    {
        $i = 0;

        if ($guru->mapel !== null) {
            return [
                $i++,
                $guru->nama,
                $guru->bagian,
                $guru->sub_bagian,
                $guru->mapel->nama,
            ];
        } else {
            return [
                $i++,
                $guru->nama,
                $guru->bagian,
                $guru->sub_bagian,
            ];
        }
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA',
            'BAGIAN',
            'SUB BAGIAN',
            'MATA PELAJARAN',
        ];
    }
}
