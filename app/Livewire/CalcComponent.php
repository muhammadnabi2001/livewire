<?php

namespace App\Livewire;

use Livewire\Component;

class CalcComponent extends Component
{
    public $result = 0;

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
    public function  hisob()
    {
        if($this->perform =='+')
        {
            $this->result=$this->num1 + $this->num2;
        }
        if($this->perform == '-')
        {
        $this->result=$this->num1 - $this->num2;
            
        }
        if($this->perform == '*')
        {
        $this->result=$this->num1 * $this->num2;
            
        }
        if($this->perform == '%')
        {
        $this->result=$this->num1 % $this->num2;
            
        }
        if($this->perform == ':')
        {
        $this->result=$this->num1 / $this->num2;
            
        }
    }
}
