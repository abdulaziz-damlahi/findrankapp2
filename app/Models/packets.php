<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\websites;
class packets extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'packet_id',
<<<<<<< HEAD
        'user_id',
        'count_of_word',
        'description',
=======
        'website_id',
        'count_of_words',
        'descrpitions',
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
        'end_of_pocket',
        'packet_names',
        'started_of_pockets',
        'count_of_websites',
    ];
    public function user()
    {
<<<<<<< HEAD
         $this->belongsTo('App\Models\User', 'id','user_id');
=======
        $this->belongsTo('App\Models\users', 'id','id');
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
    }
    public function websitess()
    {
<<<<<<< HEAD
        return $this->hasMany('App\Models\websites', 'packet_id','id');
=======
        return $this->hasMany('App\Models\websites', 'id','id');
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
    }

}
