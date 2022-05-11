<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id_pengirim',
        'employee_id_penerima',
        'meeting_id',
        'judul',
        'deskripsi',
        'tanggal',
        'status'
    ];
}
