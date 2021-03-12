<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    protected $fillable = [
        'Criteria_ID',
        'name',
        'Canonical_Name',
        'descrpitions',
        'Parent_ID',
        'Country_Code',
        'Target_Type',
        'Status',
    ];
    use HasFactory;
}
