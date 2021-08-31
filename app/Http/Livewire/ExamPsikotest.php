<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\UserAnswer;
use Livewire\Component;

class ExamPsikotest extends Component
{
    public $start;
    public $end;

    public function mount(){

    }

    public function render()
    {
        return view('livewire.exam-psikotest');
    }

    public function submitAnswer($id,$score,$pg){
        UserAnswer::find($id)->update(['score'=>$score,'answer'=>$pg]);
    }
}
