<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $title;
    public $description;
    public $posts;
    public $check = false;
    public $categories;
    public $category_id;
    public function add()
    {
        $this->check = true;
    }
    public function back()
    {
        //dd(123);
        $this->check = false;
    }
    public function render()
    {
        $this->posts = Post::orderBy('id', 'desc')->get();
        $this->categories = Category::all();
        return view('livewire.post-component', ['posts' => $this->posts]);
    }
    public function save()
    {
        //dd(123);
        if (!empty($this->title) && !empty($this->description) && !empty($this->category_id)) {

            Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->category_id
            ]);
            $this->check = false;
            $this->all();
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
