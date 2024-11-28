<?php

use App\Livewire\CalcComponent;
use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;


Route::get('/',HomeComponent::class);
Route::get('calc',CalcComponent::class);
Route::get('test',function(){
    return view('test');
});