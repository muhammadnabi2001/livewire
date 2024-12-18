<?php

namespace App\Http\Controllers;

use App\Models\Hodim;
use Illuminate\Http\Request;

class HodimController extends Controller
{
    public function hodim()
    {
        $hodims=Hodim::orderBy('id','desc')->get();
        return view('hodim',['hodimlar'=>$hodims]);
    }
}
