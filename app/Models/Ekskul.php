<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'ekskul';

    protected $primaryKey = 'id';

    protected $fillable = ['slug', 'nama', 'link_sosmed', 'gambar'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
