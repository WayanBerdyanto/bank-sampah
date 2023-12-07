<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Langganan extends Model
{
    use HasFactory;

    protected $table = 'detail_langganan';

    protected $fillable = [
        'id_dtl_langganan',
        'id_pengguna',
        'kode_langganan',
        'harga',
        'masa_langganan',
        'methode_pembayaran',
        'status',
        'tanggal',
    ];
}
