<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Models\Check;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function check()
    {
        $chatlar = Check::orderBy('id', 'desc')->get();
        return view('check', ['chatlar' => $chatlar]);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = date("Y-m-d") . '_' . time() . '.' . $extension;

            $file->move('img_uploaded/', $filename);
        }
        $Message = Check::create([
            'title' => $request->title,
            'img' => 'img_uploaded/' . $filename
        ]);
        broadcast(new MessageEvent($Message));
        return redirect()->back();
    }
}
