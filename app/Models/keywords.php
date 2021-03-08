<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'website_id',
        'name',
        'date',
    ];
    public function websites()
    {
<<<<<<< HEAD
        $this->belongsTo('App\Models\websites','id','website_id');
    }
=======
        $this->belongsTo('App\Models\websites', 'website_id','id');
    }


    public function User()
    {
        $this->belongsTo('App\Models\users', 'id','website_id');
    }

>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
}
