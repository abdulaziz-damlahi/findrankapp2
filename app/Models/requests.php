<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'input_price',
        'deneme_ay',
        'deneme_years',
        'deneme_cvs',
        'card_first_last',
        'card_number',
        'user_id',
    ];
    public function packets()
    {
        return $this->belongsTo('App\Models\packets', 'id','id');
    }
}
