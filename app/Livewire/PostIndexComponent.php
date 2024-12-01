<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndexComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('livewire.post-index-component', compact('posts'))
            ->layout('components.layouts.main');
    }
}
