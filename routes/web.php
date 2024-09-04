<?php

use App\Http\Controllers\ChatIdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\HodimController;
use App\Http\Controllers\MessagesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/message/{user}', [MessagesController::class, 'message'])->name('message');
    Route::post('/xabar/{chatId}', [MessagesController::class, 'store'])->name('xabar');
});
Route::get('/posts', PostComponent::class);
Route::get('/postedit/{id}', PostEditComponent::class)->name('postedit');
Route::get('/talabalar', TalabaComponent::class);
Route::get('/category', CategoryComponent::class);
Route::get('/newpost', PostIndexComponent::class);
Route::get('/group', GroupComponent::class);
Route::get('/task', TaskComponent::class);
Route::get('/davomat', DavomatComponent::class);
Route::get('/ovqatlar', OvqatComponent::class);
Route::get('/users', UserComponent::class);
Route::get('/check', [CheckController::class, 'check'])->name('check');
Route::post('/create', [CheckController::class, 'create'])->name('create');
Route::get('/hodim', [HodimController::class, 'hodim'])->name('hodim');
Route::get('/news', [YangiliklarController::class, 'index'])->name('news');
Route::get('/open/{yangilik}', [YangiliklarController::class, 'open'])->name('open');
Route::post('/createnew', [YangiliklarController::class, 'createnew'])->name('createnew');
Route::get('/chat', [ChatIdController::class, 'chat'])->name('chat');

require __DIR__ . '/auth.php';
