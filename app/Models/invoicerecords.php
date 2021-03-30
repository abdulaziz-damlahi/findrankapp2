<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicerecords extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
                        "first_name",
                        "last_name",
                        "id_number",
                        "address",
                        "tax_no",
                        "phone",
                        "invoice_type",
                        "country",
                        "city",
                        "company_name"

    ];
    public function user()
    {
        return $this->belongsTo('App\Models\users', 'id','id_website');
    }

}
