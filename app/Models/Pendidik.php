<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidik extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'tenaga_pendidik';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'bagian', 'sub_bagian', 'id_mapel'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function sambutan()
    {
        return $this->hasOne(Sambutan::class, 'id_kepsek');
    }
}
