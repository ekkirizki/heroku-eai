<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengiriman;

class apicontroller extends Controller
{
    //
    function get_all()
    {
        return response()->json(pengiriman::all(), 200);
    }
}
