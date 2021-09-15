<?php

namespace App\Http\Livewire;

use App\Models\PretestAspect;
use App\Models\PretestUserAnswer;
use Livewire\Component;

class PretestInstruction extends Component
{

    public $aspect;
    public $description;

    public function mount()
    {
        $this->description = PretestAspect::find($this->aspect);
    }
    public function render()
    {
        return view('livewire.pretest-instruction');
    }
}
