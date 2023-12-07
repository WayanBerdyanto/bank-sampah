<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_Pembuangan extends Model
{
    use HasFactory;

    protected $table = 'Request_Pembuangan';

    protected $fillable = [
        'id_request',
        'id_dtl_pengambilan',
        'status'
    ];
}
