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
        'date',
        'website_id',
    ];
    public function website():hasMany
    {
        return $this->hasMany('App\Models\websites', 'id','website_id');
    }

    public function User()
    {
        $this->belongsTo('App\Models\users', 'id','website_id');
    }

}
