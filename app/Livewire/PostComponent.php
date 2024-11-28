<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $title;
    public $description;
    public function render()
    {
        $posts=Post::orderBy('id','desc')->get();
        return view('livewire.post-component',compact('posts'));
    }
    public function add()
    {
        if(!empty($this->title))
        {
            if(!empty($this->description))
            {
                Post::create([
                    'title'=>$this->title,
                    'description'=>$this->description
                ]);
            }
        }
    }
}

