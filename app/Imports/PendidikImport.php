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

            switch ($row['bagian']) {
                case 'Tenaga Pendidik':
                    $bagian = 'pendidik';
                    break;
                case 'Tenaga Kepegawaian':
                    $bagian = 'kependidikan';
                    break;
                default:
                    $bagian = null;
            }

            switch ($row['sub_bagian']) {
                case 'Guru Produktif':
                    $subBagian = 'guru';
                    break;
                case 'Staff Kurikulum':
                    $subBagian = 'staff';
                    break;
                default:
                    $subBagian = null;
            }

            $mapel = Mapel::where('nama', $row['mata_pelajaran'])
                ->first();

            ($mapel !== null) ? ($id_mapel = $mapel->id) : ($id_mapel = null);

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
