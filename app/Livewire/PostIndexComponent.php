<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\View;
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
    public $commentId;
    public $parentid=null;
    public $result=false;
    public $ilike;
    public $view;

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        $categories=Category::all();
        return view('livewire.post-index-component', compact('posts','categories'))
            ->layout('components.layouts.main');
    }
    public function show(Request $request,$id)
    {

        $this->view=View::where('post_id',$id)->where('user_ip',$request->ip())->first();
        if (!$this->view) {
            View::create([
                'post_id'=>$id,
                'user_ip'=>$request->ip(),
            ]);
        }
        $this->postdetail=Post::findOrFail($id);
        //dd($id);

        $this->check=true;
    }
    public function comment(Request $request,$id)
    {
        //dd($id);
        Comment::create([
            'post_id'=>$id,
            'body'=>$this->body,
            'ip_adress'=>$request->ip()
        ]);
        $this->body='';
    }
    public function answer($id)
    {
        // dd($id);
        if ($this->result == $id) {
            $this->result =null;
        }
        else
        {
            $this->result=$id;
            $this->parentid=$id;

        }
    }
    public function commentanswer(Request $request,$id,$commentid)
    {
        //dd($id,$commentid,$this->body);
        Comment::create([
            'post_id'=>$id,
            'body'=>$this->body,
            'ip_adress'=>$request->ip(),
            'parent_id'=>$commentid
        ]);
        $this->body='';
        $this->result=null;
    }
    public function like(Request $request,$id)
    {
        $this->ilike=Like::where('post_id',$id)->where('user_ip',$request->ip())->first();
        if($this->ilike)
        {
            if($this->ilike->status ==1 )
            {
            $this->ilike->delete();
            }else{
            $this->ilike->status=1;
            $this->ilike->save();
            }
        }
        else{
            Like::create([
                'post_id'=>$id,
                'user_ip'=>$request->ip(),
                'status'=>1
            ]);
        }

    }
    public function dislike(Request $request,$id)
    {
        //dd($id);
        $this->ilike=Like::where('post_id',$id)->where('user_ip',$request->ip())->first();
        if($this->ilike)
        {
            if($this->ilike->status ==0 )
            {
            $this->ilike->delete();
            }else{
            $this->ilike->status=0;
            $this->ilike->save();
            }
        }
        else{
            Like::create([
                'post_id'=>$id,
                'user_ip'=>$request->ip(),
                'status'=>1
            ]);
        }
    }
}
