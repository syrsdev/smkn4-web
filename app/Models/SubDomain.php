<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDomain extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'sub_domain';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'url', 'status'];
}
