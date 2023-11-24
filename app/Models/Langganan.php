<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langganan extends Model
{
    use HasFactory;

    protected $table = 'langganan';

    protected $fillable = [
        'kode_langganan',
        'nama_langganan',
        'layanan',
        'lama_langganan',
        'desc',
        'harga'
    ];
}
