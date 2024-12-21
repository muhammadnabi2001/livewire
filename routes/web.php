<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\HodimController;
use App\Http\Controllers\YangiliklarController;
use App\Livewire\CalcComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\DavomatComponent;
use App\Livewire\GroupComponent;
use App\Livewire\HomeComponent;
use App\Livewire\OvqatComponent;
use App\Livewire\PostComponent;
use App\Livewire\PostDeleteComponent;
use App\Livewire\PostEditComponent;
use App\Livewire\PostIndexComponent;
use App\Livewire\PostShowComponent;
use App\Livewire\TalabaComponent;
use App\Livewire\TaskComponent;
use App\Livewire\UserComponent;
use Illuminate\Support\Facades\Route;


Route::get('/',HomeComponent::class);
Route::get('calc',CalcComponent::class);
Route::get('test',function(){
    return view('test');
});
Route::get('/posts',PostComponent::class);
Route::get('/postedit/{id}',PostEditComponent::class)->name('postedit');
Route::get('/talabalar',TalabaComponent::class);
Route::get('/category',CategoryComponent::class);
Route::get('/newpost',PostIndexComponent::class);
Route::get('/group',GroupComponent::class);
Route::get('/task',TaskComponent::class);
Route::get('/davomat',DavomatComponent::class);
Route::get('/ovqatlar',OvqatComponent::class);
Route::get('/users',UserComponent::class);
Route::get('/check',[CheckController::class,'check'])->name('check');
Route::post('/create',[CheckController::class,'create'])->name('create');
Route::get('/hodim',[HodimController::class,'hodim'])->name('hodim');
Route::get('/news',[YangiliklarController::class,'index'])->name('news');
Route::get('/open/{yangilik}',[YangiliklarController::class,'open'])->name('open');
Route::post('/createnew',[YangiliklarController::class,'createnew'])->name('createnew');