<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEditComponent extends Component
{
    public $post;
    public $title;
    public $description;
    public function mount($id)
    {
        $this->post=Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->description = $this->post->description;
    }
    public function render()
    {    
        return view('livewire.post-edit-component',['post' => $this->post]);
    }
    public function update()
    {
        $this->post->title = $this->title;
        $this->post->description = $this->description;

        $this->post->save();

        session()->flash('message', 'Post muvaffaqiyatli yangilandi!');
        $this->emit('postUpdated');
        return redirect('posts');
    }
}
