<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'hero_section';

    protected $primaryKey = 'id';

    protected $fillable = ['key', 'value'];
}
