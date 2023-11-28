<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pembuangan extends Model
{
    protected $table = 'detail_pembuangan';

    protected $fillable = [
        'id_dtl_pembuangan',
        'id_master_pembuangan',
        'status',
        'berat_sampah',
        'tanggal',
        'jam_penerimaan',
        'hari'
    ];

    use HasFactory;
}
