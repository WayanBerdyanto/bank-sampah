<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pengambilan extends Model
{
    use HasFactory;

    protected $table = 'detail_pengambilan';

    protected $fillable = [
        'id_dtl_pengambilan',
        'id_nota',
        'id_pengambil',
        'berat',
        'status_pengambilan'
    ];
}
