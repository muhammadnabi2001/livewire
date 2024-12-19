<?php

namespace App\Http\Controllers;

use App\Models\Yangiliklar;

class YangiliklarController extends Controller
{
    public function index()
    {
        $news=Yangiliklar::orderBy('id','desc')->where('status',1)->get();

        return view('news',['news'=>$news]);
    }
    public function open(Yangiliklar $yangilik)
    {
      // dd($yangilik->title);
      $yangilik->status=2;
      $yangilik->save();
      return redirect()->back();
    }
}
