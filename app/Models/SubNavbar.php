<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubNavbar extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'sub_navbar';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'url', 'status'];
}
