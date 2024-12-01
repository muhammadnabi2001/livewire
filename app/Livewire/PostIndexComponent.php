<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
class PostIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $check=false;
    public $postdetail;
    public $body;

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        $categories=Category::all();
        return view('livewire.post-index-component', compact('posts','categories'))
            ->layout('components.layouts.main');
    }
    public function show($id)
    {
        $this->postdetail=Post::findOrFail($id);
        //dd($id);

        $this->check=true;
    }
    public function comment(Request $request,$id)
    {
        //dd($request->ip(),$id,$this->body);
        Comment::create([
            'post_id'=>$id,
            'body'=>$this->body,
            'ip_adress'=>$request->ip()
        ]);
        $this->body='';
    }
}
