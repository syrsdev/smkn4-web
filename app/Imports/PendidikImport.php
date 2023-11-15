<?php

namespace App\Imports;

use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendidikImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $nama = preg_replace('/[^a-z0-9]+/i', ' ', $row['nama']);
            $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

            if ($row['bagian'] === 'Tenaga Pendidik') {
                $bagian = 'pendidik';
            } elseif ($row['bagian'] === 'Tenaga Kepegawaian') {
                $bagian = 'pegawai';
            }

            if ($row['sub_bagian'] === 'Guru Produktif') {
                $subBagian = 'guru';
            } elseif ($row['sub_bagian'] === 'Staff Kurikulum') {
                $subBagian = 'staff';
            }

            $mapel = Mapel::where('nama', $row['mata_pelajaran'])
                ->first();

            if ($mapel !== null) {
                $id_mapel = $mapel->id;
            } else {
                $id_mapel = null;
            }

            Pendidik::insert([
                'slug' => $slug,
                'nama' => $row['nama'],
                'bagian' => $bagian,
                'sub_bagian' => $subBagian,
                'id_mapel' => $id_mapel,
            ]);
        }
    }
}
