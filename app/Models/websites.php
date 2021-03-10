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
        'website_name',
        'id_website',
        'rank',
    ];

    public function User()
    {
        $this->belongsTo('App\Models\users', 'id','website_id');
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

