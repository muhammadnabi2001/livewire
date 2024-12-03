<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $task1;
    public $task2;
    public $task3;
    public $task4;
    public function render()
    {
        $this->task1=Task::where('status',1)->get();
        $this->task2=Task::where('status',2)->get();
        $this->task3=Task::where('status',3)->get();
        $this->task4=Task::where('status',4)->get();
        return view('livewire.task-component');
    }
    public function updateTask($taskId,$status)
    {
        $task=Task::where('id',$taskId)->first();
        dd($task);
    }
}
