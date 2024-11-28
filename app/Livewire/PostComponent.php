<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $title;
    public $description;
    public $posts;
    public function render()
    {
        $this->posts=Post::orderBy('id','desc')->get();
        return view('livewire.post-component',['posts'=>$this->posts]);
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
    public function delete($id)
    {
        //dd($id);
        $post = Post::findOrFail($id);
        $post->delete();

        $this->posts = Post::orderBy('id', 'desc')->get();
    }
}

