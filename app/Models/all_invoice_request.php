<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class all_invoice_request extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'invoice_id',
        'deneme_ay',
        'deneme_years',
        'deneme_cvs',
        'card_first_last',
        'card_number',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
