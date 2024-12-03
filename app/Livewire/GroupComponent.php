<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class GroupComponent extends Component
{
    public $groups;
    public function render()
    {
        $this->groups=Group::orderBy('sort','asc')->get();
        return view('livewire.group-component');
    }
    public function updateGroup($groupId)
    {
        // dd($groupId);
        foreach ($groupId as $key) {
            // dd($key);
            Group::where('id',$key['value'])->update([
                'sort'=>$key['order']
            ]);
        }
    }
}
