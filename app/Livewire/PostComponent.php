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
    public $searchtitle;
    public $searchdescription;
    public $searchcategory;

    protected $paginationTheme = 'bootstrap';

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
        $this->categories = Category::all();
        
        $query = Post::query();

        if ($this->searchtitle) {
            $query->where('title', 'LIKE', "{$this->searchtitle}%");
        }
        if ($this->searchdescription) {
            $query->where('description', 'LIKE', "{$this->searchdescription}%");
        }
        if ($this->searchcategory) {
            $query->where('category_id', $this->searchcategory);
        }

        $posts = $query->orderBy('id', 'desc')->paginate(10);

        return view('livewire.post-component', compact('posts'));
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
            $this->reset(['title', 'description', 'category_id']);
        }
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
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
    }
    public function searchColumps()
    {
        // dd(123);
        //dd($this->searchcategory, $this->searchtitle, $this->searchdescription);
        $posts = Post::orderBy('id', 'desc')
            ->where('description', "LIKE", "{$this->searchdescription}%")
            ->where('title', 'LIKE', "{$this->searchtitle}%")
            ->where('category_id', '=', "{$this->searchcategory}%")->get();
        // $this->all();
    }
}