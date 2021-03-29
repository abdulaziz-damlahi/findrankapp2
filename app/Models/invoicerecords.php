<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicerecords extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'id_number',
        'tax_no',
        'tax_address',
        'invoice_type',
        'country',
        'user_id',
        'city',
        'company_name',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\users', 'id','id_website');
    }

}
