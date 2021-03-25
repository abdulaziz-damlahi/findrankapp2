<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cards extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'input_price',
        'card_first_last',
        'card_number',
        'Ay',
        'Yil',
        'CVC',
    ];
}
