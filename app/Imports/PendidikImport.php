<?php

namespace App\Imports;

use App\Models\Mapel;
use App\Models\Pendidik;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendidikImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            switch ($row['bagian']) {
                case 'Tenaga Pendidik':
                    $bagian = 'Pendidik';
                    break;
                case 'Tenaga Kependidikan':
                    $bagian = 'Kependidikan';
                    break;
                case 'Kepala Sekolah':
                    $bagian = 'Kepala Sekolah';
                    break;
                default:
                    $bagian = null;
            }

            switch ($row['sub_bagian']) {
                case 'Guru Produktif':
                    $subBagian = 'Guru';
                    break;
                case 'Staff Kurikulum':
                    $subBagian = 'Staff';
                    break;
                case 'Kepala Sekolah':
                    $subBagian = 'Kepala Sekolah';
                    break;
                default:
                    $subBagian = null;
            }

            $mapel = Mapel::where('nama', $row['mata_pelajaran'])
                ->first();

            ($mapel !== null) ? ($id_mapel = $mapel->id) : ($id_mapel = null);

            Pendidik::insert([
                'slug' => Str::slug($row['nama']),
                'nama' => $row['nama'],
                'bagian' => $bagian,
                'sub_bagian' => $subBagian,
                'id_mapel' => $id_mapel,
            ]);
        }
    }
}
