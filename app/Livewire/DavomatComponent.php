<?php

namespace App\Livewire;

use App\Models\Davomat;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class DavomatComponent extends Component
{
    public $now;
    public $select;
    public $days = [];
    public $users;
    public $check;
    public $person;
    public $kun;
    public $fullDate;
    public $status;

    public function render()
    {
        $this->users=User::orderBy('id','desc')->get();
        $daysInMonth = Carbon::parse(now())->daysInMonth;
        $this->days = range(1, $daysInMonth);
        $this->day();
        return view('livewire.davomat-component');
    }
    public function day()
    {
        $this->now=Carbon::parse($this->select)->format('F Y');
        $daysInMonth = Carbon::parse($this->now)->daysInMonth;

        $this->days = range(1, $daysInMonth); 
    }
    public function result($kun,$userId)
    {
        $this->person=$userId;
        $this->kun=$kun;
        // dd($kun,$userId,$this->fullDate,$this->status);
        // Davomat::create([
        //     'user_id'=>$userId,
        //     'date'=>$kun,
        //     'status'=>$this->status
        // ]);
    }
    public function store($kun, $userId)
{
    $this->fullDate = Carbon::parse($this->now)->format("Y-m") . '-' . $kun;
    Davomat::updateOrCreate(
        [
            'user_id' => $userId,
            'date' => $this->fullDate,
        ],
        [
            'status' => $this->status 
        ]
    );

    $this->status = ''; 
}

}
