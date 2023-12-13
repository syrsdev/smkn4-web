<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'prestasi';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'judul', 'kategori', 'konten', 'peserta', 'gambar', 'status', 'views', 'id_penulis'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function penulis()
    {
        return $this->belongsTo(User::class, 'id_penulis');
    }
}
