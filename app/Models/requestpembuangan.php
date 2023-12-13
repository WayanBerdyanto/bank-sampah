<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestpembuangan extends Model
{
    use HasFactory;

    protected $table = 'request_pembuangan';

    protected $fillable = [
        'id_request',
        'id_dtl_pengambilan',
        'status'
    ];
}
