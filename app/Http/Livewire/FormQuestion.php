<?php

namespace App\Http\Livewire;

use App\Models\Aspect;
use App\Models\Question;
use App\Models\QuestionChoice;
use Livewire\Component;

class FormQuestion extends Component
{
    public $action;
    public $optionAspect;
    public $question;
    public $choiceAnswer;
    public $scoreAnswer;
    public $dataId;
    public function mount(){
        $this->optionAspect=eloquent_to_options(Aspect::get(),'id','title');
        $this->question=[
            'title'=>'',
            'aspect_id'=>1
        ];
        $this->choiceAnswer=[
            0=>'',
            1=>'',
            2=>'',
            3=>'',
        ];
        $this->scoreAnswer=[
            0=>0,
            1=>0,
            2=>0,
            3=>0,
        ];
        if ($this->dataId!=null){
            $question=Question::find($this->dataId);
            $this->question=[
                'title'=>$question->title,
                'aspect_id'=>$question->aspect_id
            ];
            $choice=QuestionChoice::whereQuestionId($this->dataId)->get();
            for ($i=0;$i<count($choice);$i++){
                $this->scoreAnswer[$i]=$choice[$i]->score;
                $this->choiceAnswer[$i]=$choice[$i]->answer;
            }
        }
    }
    public function create(){
        $question=Question::create($this->question);
        for ($i=0;$i<count($this->scoreAnswer);$i++){
            QuestionChoice::create([
                'answer'=>$this->choiceAnswer[$i],
                'score'=>$this->scoreAnswer[$i],
                'question_id'=>$question->id
            ]);
        }
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data entered successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

//        $this->emit('redirect', route('admin.question.index'));
    }

    public function update(){
        $question=Question::find($this->dataId)->update($this->question);
        $choice=QuestionChoice::whereQuestionId($this->dataId)->delete();
        for ($i=0;$i<count($this->scoreAnswer);$i++){
            QuestionChoice::create([
                'answer'=>$this->choiceAnswer[$i],
                'score'=>$this->scoreAnswer[$i],
                'question_id'=>$this->dataId
            ]);
        }
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data updated successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);

        $this->emit('redirect', route('admin.question.index'));
    }
    public function render()
    {
        return view('livewire.form-question');
    }
}
