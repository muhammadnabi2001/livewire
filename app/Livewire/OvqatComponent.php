<?php

namespace App\Livewire;

use App\Models\Masalliq;
use App\Models\Ovqat;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OvqatComponent extends Component
{
    public $masalliqs;
    public $masalliq_id = [];
    public function render()
    {
        $this->masalliqs = Masalliq::all();
        return view('livewire.ovqat-component');
    }
    public function store()
    {
        //dd($this->masalliq_id);
        if (count($this->masalliq_id)<3) {
            return back();
        }
        $all = DB::table('ovqats')
            ->join('ovqat_masalliqs', 'ovqats.id', '=', 'ovqat_masalliqs.ovqat_id') 
            ->whereIn('ovqat_masalliqs.masalliq_id', $this->masalliq_id) 
            ->select('ovqats.name') 
            ->get();
        if($all->count()<3)
        {
            return back();
        }
        else{
            $ovqats=$all;
        }
    
        dd($all);
    }
    

    
}
