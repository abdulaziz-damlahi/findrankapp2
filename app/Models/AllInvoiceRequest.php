<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllInvoiceRequest extends Model
{
    protected $fillable = [
        'id',
        'invoice_id',
        'invoice_price',
        'invoice_type',
        'description',
        'phone',
        'tax_number',
        'city',
        'district',
        'order_no',
        'order_date',
        'created_at',
        'updated_at',
        'user_id',
    ];
}
