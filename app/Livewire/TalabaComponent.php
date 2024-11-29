<?php

namespace App\Livewire;

use App\Models\Talaba;
use Livewire\Component;

class TalabaComponent extends Component
{
    public $fio;
    public $manzil;
    public $yosh;
    public $kurs;
    public $yunalish;
    public $models;
    public $activeForm;

    public $searchfio;
    public $searchmanzil;
    public $searchyosh;
    public $searchkurs;
    public $searchyunalish;
    public function mount()
    {
        $this->all();
    }
    public function all()
    {
        $this->models = Talaba::orderBy('id', 'desc')->get();
        return $this->models;
    }
    public function render()
    {
        return view('livewire.talaba-component');
    }
    public function create()
    {
        $this->activeForm = true;
    }
    public function cancel()
    {
        $this->activeForm = false;
    }
    public function save()
    {
        if (!empty($this->fio) && !empty($this->manzil) && !empty($this->yosh) && !empty($this->yunalish) && !empty($this->kurs)) {
            Talaba::create([
                'fio' => $this->fio,
                'manzil' => $this->manzil,
                'yosh' => $this->yosh,
                'yunalish' => $this->yunalish,
                'kurs' => $this->kurs,
            ]);
            $this->fio = '';
            $this->manzil = '';
            $this->yosh = '';
            $this->yunalish = '';
            $this->kurs = '';
        }
        $this->all();
        $this->activeForm = false;
    }
    public function searchColumps()
    {
        //dd($this->searchfio)
        $this->models = Talaba::where('fio', 'LIKE', "{$this->searchfio}%")
            ->where('manzil', 'LIKE', "{$this->searchmanzil}%")
            ->where('yosh', 'LIKE', "{$this->searchyosh}%")
            ->where('yunalish', 'LIKE', "{$this->searchyunalish}%")
            ->where('kurs', 'LIKE', "{$this->searchkurs}%")->get();
    }
    public function changeactive(Talaba $model)
    {
        //dd($id);
        //dd($model->id);
        $model->update([
            'is_active'=>!$model->is_active,
        ]);
        $this->all();
    }
}
