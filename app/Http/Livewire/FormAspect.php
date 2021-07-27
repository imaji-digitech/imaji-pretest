<?php

namespace App\Http\Livewire;

use App\Models\Aspect;
use Livewire\Component;

class FormAspect extends Component
{
    public $action;
    public $aspect;
    public $dataId;
    public function mount(){
        $this->aspect=[
            'title'=>''
        ];
        if ($this->dataId!=null){
            $aspect=Aspect::find($this->dataId);
            $this->aspect=[
                'title'=>$aspect->title
            ];
        }
    }
    protected function rules()
    {
        return [
            'aspect.title'=>'required|max:255'
        ];
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        Aspect::create($this->aspect);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data updated successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.aspect.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        Aspect::find($this->dataId)->update($this->aspect);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data updated successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.aspect.index'));
    }
    public function render()
    {
        return view('livewire.form-aspect');
    }
}
