<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoicerecords extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "taxNumber",
        "first_name",
        "last_name",
        "taxpayer",
        "id_number",
        "tax_address",
        "tax_no",
        "e_invoice",
        "phone",
        "email",
        "country",
        "city",
        "district",
        "company_name",
        "invoice_type",

    ];

    public function user()
    {
        return $this->belongsTo('App\Models\users', 'id', 'id_website');
    }

}
