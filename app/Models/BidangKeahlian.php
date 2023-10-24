<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'bidang_keahlian';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function program()
    {
        return $this->hasMany(ProgramKeahlian::class, 'id_bidang');
    }
}
