<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Enums\CalculationMode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class websites extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
<<<<<<< HEAD
        'user_id',
        'packet_id',
=======
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
        'website_names',
        'rank',
    ];

    public function User()
    {
<<<<<<< HEAD
        $this->belongsTo('App\Models\User', 'id','user_id');
=======
        $this->belongsTo('App\Models\users', 'id','website_id');
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
    }

    public function keywords()
    {
        return $this->hasMany('App\Models\keywords', 'website_id','id');
    }

    public function packets():HasMany
    {
        $this->HasMany('App\Models\packets', 'id','id');
    }

}

