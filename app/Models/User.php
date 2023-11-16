<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['slug', 'name', 'email', 'password', 'level'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'users';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'id_penulis');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'id_penulis');
    }
}
