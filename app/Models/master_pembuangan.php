<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_pembuangan extends Model
{
    use HasFactory;

    protected $table = 'master_pembuangan';

    protected $fillable = [
        'id_master_pembuangan',
        'id_bank_sampah',
        'id_pengguna',
        'jenis_sampah',
        'jam_pengajuan',
    ];
}
