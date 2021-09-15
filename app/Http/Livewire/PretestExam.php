<?php

namespace App\Http\Livewire;

use App\Models\PretestAspect;
use App\Models\PretestUserAnswer;
use Carbon\Carbon;
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
    public $q;

    public function mount()
    {
        $this->description = PretestAspect::find($this->aspect);
        $this->essay = [];
        $this->answer = "";
        $this->check = array();
        $aspect = $this->aspect;
        $questions = PretestUserAnswer::
        whereUserId(auth()->id())
            ->whereHas('pretestQuestion', function ($q) use ($aspect) {
                $q->where('pretest_aspect_id', '=', $aspect);
            })->get();
        foreach ($questions as $q) {
            $this->essay[$q->id] = $q->answer;
        }
        $this->q=$questions;
    }

    public function check(){
        $pua = PretestUserAnswer::find($this->q[0]->id);
        if ($pua->created_at->addMinutes($pua->pretestQuestion->pretestAspect->time) <= Carbon::now()) {
            if ($this->aspect + 1 == 7) {
                return redirect(route('admin.dashboard'));
            }
            return redirect(route('admin.exam.instruction', $this->aspect + 1));
        }
    }

    public function render()
    {
        $aspect = $this->aspect;
        $questions = PretestUserAnswer::whereUserId(auth()->id())
            ->whereHas('pretestQuestion', function ($q) use ($aspect) {
                $q->where('pretest_aspect_id', '=', $aspect);
            })->get();
        return view('livewire.pretest-exam', compact('questions'));
    }

    public function submitAnswer($id, $score, $pg)
    {
        $pua = PretestUserAnswer::find($id);
        if ($pua->created_at->addMinutes($pua->pretestQuestion->pretestAspect->time) <= Carbon::now()) {
            $this->emit('swal:alert', [
                'type' => 'success',
                'title' => 'Ujian telah selesai',
                'timeout' => 3000,
                'icon' => 'success'
            ]);
            $this->emit('redirect', route('admin.dashboard'));
        } else {
            $pua->update(['score' => $score, 'answer' => $pg]);
        }
    }

    public function submitAnswerEssay($id)
    {
        $pua = PretestUserAnswer::find($id);
        if ($pua->created_at->addMinutes($pua->pretestQuestion->pretestAspect->time) <= Carbon::now()) {
            $this->emit('swal:alert', [
                'type' => 'success',
                'title' => 'Ujian telah selesai',
                'timeout' => 3000,
                'icon' => 'success'
            ]);
            $this->emit('redirect', route('admin.dashboard'));
        } else {
            $pua->update(['score' => 0, 'answer' => $this->essay[$id]]);
        }
    }

    public function submitAnswerCheckbox($id, $check)
    {
        $score = 0;
        $pua = PretestUserAnswer::find($id);
        if ($pua->created_at->addMinutes($pua->pretestQuestion->pretestAspect->time) <= Carbon::now()) {
            $this->emit('swal:alert', [
                'type' => 'success',
                'title' => 'Ujian telah selesai',
                'timeout' => 3000,
                'icon' => 'success'
            ]);
            $this->emit('redirect', route('admin.dashboard'));
        } else {
            if ($pua->answer != "") {
                $nowAnswer = explode(';', $pua->answer);
                $a = (in_array($check, $nowAnswer));
                if ($a) {
                    $nowAnswer = array_diff($nowAnswer, [$check]);
                } else {
                    array_push($nowAnswer, $check);
                }
                sort($nowAnswer);

                $nowAnswer = implode(';', $nowAnswer);
            } else {
                $nowAnswer = "$check";
            }
            if ($pua->pretestQuestion->answer == $nowAnswer) {
                $score = 1;
            }
            $pua->update(['score' => $score, 'answer' => $nowAnswer]);
        }
    }
}
