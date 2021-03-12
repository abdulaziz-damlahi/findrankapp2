<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class keywords extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'date',
        'user_keyword_id',
    ];
    public function website():hasMany
    {
        return $this->hasMany('App\Models\websites', 'id','id');
    }
    public function websites()
    {
        return $this->belongsTo('App\Models\websites', 'id','user_keyword_id');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\users', 'id','user_keyword_id');
    }

}
