<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{

    protected $table = 'pengguna';
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'nama_lengkap',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'no_telpon',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
