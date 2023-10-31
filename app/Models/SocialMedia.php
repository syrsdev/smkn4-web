<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'social_media';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'url', 'status'];
}
