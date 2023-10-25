<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'galeri_konsentrasi';

    protected $primaryKey = 'id';

    protected $fillable = ['id_konsentrasi', 'gambar', 'keterangan'];

    public function konsentrasi()
    {
        return $this->belongsTo(KonsentrasiKeahlian::class, 'id_konsentrasi');
    }
}
