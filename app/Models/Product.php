<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'blok',
        'no_kavling',
        'type',
        'luas_tanah',
        'price',
        'status',
        'tanah_lebih',
        'discount'
    ];
}
