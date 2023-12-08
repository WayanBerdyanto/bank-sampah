<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_pengambilan extends Model
{
    use HasFactory;

    protected $table = 'master_pengambilan';

    protected $fillable = [
        'id_nota',
        'id_pengguna',
        'jenis_sampah',
        'jam',
        'hari',
        'tanggal'
    ];
}
