<?php

namespace App\Http\Controllers;

use App\Events\NotifyEvent;
use App\Models\Yangiliklar;
use Illuminate\Http\Request;

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
      broadcast(new NotifyEvent($yangilik));
      return redirect()->back();
    }
    public function createnew(Request $request)
    {
      $request->validate([
        'title' => 'required|string',
        'description'=>'required|string',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

        $file->move('img_uploaded/', $filename);
    }
    $Message = Yangiliklar::create([
        'title' => $request->title,
        'description' => $request->description,
        'img' => 'img_uploaded/' . $filename
    ]);
    broadcast(new NotifyEvent($Message));
    return redirect()->back();
    }
}
