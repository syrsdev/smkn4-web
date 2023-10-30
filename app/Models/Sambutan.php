<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'sambutan_kepsek';

    protected $primaryKey = 'id';

    protected $fillable = ['judul', 'konten', 'id_kepsek'];

    public function kepsek()
    {
        return $this->belongsTo(Pendidik::class, 'id_kepsek');
    }
}
