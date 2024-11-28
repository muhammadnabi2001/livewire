<?php

use App\Livewire\CalcComponent;
use App\Livewire\HomeComponent;
use App\Livewire\PostComponent;
use App\Livewire\PostEditComponent;
use Illuminate\Support\Facades\Route;


Route::get('/',HomeComponent::class);
Route::get('calc',CalcComponent::class);
Route::get('test',function(){
    return view('test');
});
Route::get('posts',PostComponent::class);
Route::get('/postedit/{id}',PostEditComponent::class)->name('postedit');