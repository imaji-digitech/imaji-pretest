<?php

namespace App\Http\Livewire;

use App\Models\Aspect;
use App\Models\PretestAspect;
use Livewire\Component;

class PretestFormAspect extends Component
{
    public $action;
    public $aspect;
    public $dataId;

    public function mount(){
        $this->aspect=[
            'title'=>'',
            'time'=>0,
            'description'=>'',
        ];
        if ($this->dataId!=null){
            $aspect=PretestAspect::find($this->dataId);
            $this->aspect=[
                'title'=>$aspect->title,
                'time'=>$aspect->time,
                'description'=>$aspect->description,
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
        PretestAspect::create($this->aspect);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data updated successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.pretest-aspect.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        PretestAspect::find($this->dataId)->update($this->aspect);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data updated successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.pretest-aspect.index'));
    }
    public function render()
    {
        return view('livewire.pretest-form-aspect');
    }
}
