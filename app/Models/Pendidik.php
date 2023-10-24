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

    protected $fillable = ['nama', 'bagian', 'sub_bagian', 'id_mapel'];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_mapel');
    }

    public function sambutan()
    {
        return $this->belongsTo(Sambutan::class, 'id_kepsek');
    }
}
