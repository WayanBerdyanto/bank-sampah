<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaansampah extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_sampah';

    protected $fillable = [
        'id_penerimaan_sampah',
        'id_bank_sampah',
        'id_request',
        'confirm',
        'jam_terima',
        'tanggal_terima',
    ];
}
