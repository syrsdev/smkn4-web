<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'program_keahlian';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'id_bidang'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bidang()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bidang');
    }

    public function konsentrasi()
    {
        return $this->hasMany(KonsentrasiKeahlian::class, 'id_program');
    }
}
