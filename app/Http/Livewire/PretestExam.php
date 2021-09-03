<?php

namespace App\Http\Livewire;

use App\Models\PretestAspect;
use App\Models\PretestUserAnswer;
use Livewire\Component;

class PretestExam extends Component
{
    public $start;
    public $end;
    public $check;

    public $aspect;
    public $answer;

    public $essay;
    public $description;

    public function mount()
    {
        $this->description=PretestAspect::find($this->aspect);
        $this->essay=[];
        $this->answer="";
        $this->check = array();
        $aspect = $this->aspect;
        $questions = PretestUserAnswer::
        whereUserId(auth()->id())
            ->whereHas('pretestQuestion', function ($q) use ($aspect) {
                $q->where('pretest_aspect_id', '=', $aspect);
            })->get();
        foreach ($questions as $q){
            $this->essay[$q->id]=$q->answer;
        }
    }

    public function render()
    {
        $aspect = $this->aspect;
        $questions = PretestUserAnswer::
        whereUserId(auth()->id())
            ->whereHas('pretestQuestion', function ($q) use ($aspect) {
                $q->where('pretest_aspect_id', '=', $aspect);
            })->get();

        return view('livewire.pretest-exam', compact('questions'));
    }

    public function submitAnswer($id, $score, $pg)
    {
        PretestUserAnswer::find($id)->update(['score' => $score, 'answer' => $pg]);
    }

    public function submitAnswerEssay($id){
        PretestUserAnswer::find($id)->update(['score'=>0,'answer'=>$this->essay[$id]]);
    }

    public function submitAnswerCheckbox($id, $check)
    {
        $score = 0;
        $now = PretestUserAnswer::find($id);
        if ($now->answer!="") {
            $nowAnswer = explode(';', $now->answer);
            $a = (in_array($check, $nowAnswer));
            if ($a) {
                $nowAnswer = array_diff($nowAnswer, [$check]);
            } else {
                array_push($nowAnswer, $check);
            }
            sort($nowAnswer);

            $nowAnswer = implode(';', $nowAnswer);
        }else{
            $nowAnswer="$check";
        }
        if ($now->pretestQuestion->answer == $nowAnswer) {
            $score = 1;
        }
        $now->update(['score' => $score, 'answer' => $nowAnswer]);
    }
}
