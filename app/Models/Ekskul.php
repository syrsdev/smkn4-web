<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'ekskul';

    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'link_sosmed', 'gambar'];
}
