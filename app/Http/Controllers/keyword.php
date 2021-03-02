<?php

namespace App\Http\Controllers;

use App\Models\keywords;
use Illuminate\Http\Request;

class keyword extends Controller
{

    public function getkeyword()
    {
        $payments = keywords::get();
        return response()->json($payments->get());

    }
}
