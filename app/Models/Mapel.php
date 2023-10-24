<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'mapel';

    protected $primaryKey = 'id';

    protected $fillable = 'nama';

    public function pendidik()
    {
        return $this->belongsTo(Pendidik::class, 'id_mapel');
    }
}
