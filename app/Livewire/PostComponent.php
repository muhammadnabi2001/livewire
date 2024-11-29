<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination; 

    public $title;
    public $description;
    public $check = false;
    public $categories;
    public $category_id;
    public $editformpost = false;
    public $edittitle;
    public $editdescription;
    public $editcategory_id;
    

    public function add()
    {
        $this->check = true;
    }

    public function back()
    {
        $this->check = false;
    }

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $this->categories = Category::all();
        return view('livewire.post-component', ['posts' => $posts]); 
    }

    public function save()
    {
        if (!empty($this->title) && !empty($this->description) && !empty($this->category_id)) {
            Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id
            ]);
            $this->check = false;
            $this->resetPage(); 
        }
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
        $this->resetPage(); 
    }

    public function update(Post $post)
    {
        $this->editformpost = $post->id;
        $this->edittitle = $post->title;
        $this->editdescription = $post->description;
        $this->editcategory_id = $post->category_id;
    }

    public function renameall()
    {
        $post = Post::findOrFail($this->editformpost);
        $post->update([
            'title' => $this->edittitle,
            'description' => $this->editdescription,
            'category_id' => $this->editcategory_id,
        ]);
        $this->editformpost = false;
        $this->resetPage(); 
    }
}
