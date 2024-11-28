<?php

namespace App\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public $a = 0;
    public $perform;
    public $result = 0;
    public $num1='';
    public $num2='';
    public function render()
    {
        return view('livewire.home-component');
    }
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
