<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Talaba;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $check;
    public $models;
    public $name;
    public $searchname;
    public $editformCategory=false;
    public $editname;
    public function mount()
    {
        $this->all();
    }
    public function all()
    {
        $this->models = Category::orderBy('id', 'desc')->get();
        return $this->models;
    }
    public function render()
    {
        return view('livewire.category-component');
    }
    public function add()
    {
        $this->check = true;
    }
    public function back()
    {
        //dd(123);
        $this->check = false;
    }
    public function save()
    {
        if(!empty($this->name))
        {
            Category::create([
                'name'=>$this->name
            ]);
            $this->name='';
            $this->check=false;
        }
        $this->all();
        
    }
    public function searchcategory()
    {
        $this->models = Category::orderBy('id', 'desc')
        ->where('name','LIKE',"{$this->searchname}%")->get();
    }
    public function alter(Category $category)
    {
        //dd($category->name);
        $category->update([
            'is_active'=>! $category->is_active
        ]);
        $this->all();
    }
    public function editform(Category $category)
    {
        $this->editformCategory=$category->id;
        $this->editname=$category->name;
        //dd($id);
    }
    public function update()
    {
       $models=Category::findOrFail($this->editformCategory);
       $models->update([
        'name'=>$this->editname
       ]);
       $this->all();
       $this->editformCategory=false;
    }
    public function deleteform(Category $category)
    {
        $category->delete();
        $this->all();
    }
}
