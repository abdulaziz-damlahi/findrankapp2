<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    /**
     * App\Models\requests
     * @property int $id
     * @property int input_price
     * @property int card_number
     * @property string card_first_last
     * @property int|null Ay
     * @property int|null Ay
     * @property int|null CVC
     * */
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
    public function packets()
    {
        return $this->belongsTo('App\Models\packets', 'id','id');
    }
}
