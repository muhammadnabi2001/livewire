<?php

namespace App\Livewire;

use Livewire\Component;

class CalcComponent extends Component
{
    public function render()
    {
        return view('livewire.calc-component');
    }
    public $a = 0;
    
    public function add()
    {
        $this->a++;
    }
    public function sub()
    {
        $this->a--;
    }
}
