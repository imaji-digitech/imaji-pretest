<?php

namespace App\Http\Livewire;

use App\Models\PretestAspect;
use App\Models\PretestQuestion;
use App\Models\PretestQuestionChoice;
use Livewire\Component;

class PretestFormQuestion extends Component
{
    public $action;
    public $optionAspect;
    public $optionType;
    public $question;
    public $choiceAnswer;
    public $scoreAnswer;
    public $dataId;

    public function mount()
    {
        $this->optionAspect = eloquent_to_options(PretestAspect::get(), 'id', 'title');
        $this->optionType = [
            ['value' => 1, 'title' => 'Pilihan Ganda'],
            ['value' => 2, 'title' => 'Memilih angka'],
            ['value' => 3, 'title' => 'Isian'],
        ];
        $this->question = [
            'title' => '',
            'pretest_aspect_id' => 1,
            'question_type' => 1
        ];
        $this->choiceAnswer = [
            0 => '',
            1 => '',
            2 => '',
            3 => '',
            4 => '',
        ];
        $this->scoreAnswer = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
        ];
        if ($this->dataId != null) {
            $question = PretestQuestion::find($this->dataId);
            $this->question = [
                'title' => $question->title,
                'pretest_aspect_id' => $question->pretest_aspect_id,
                'answer' => $question->answer,
                'question_type' => $question->question_type
            ];
            $choice = PretestQuestionChoice::wherePretestQuestionId($this->dataId)->get();
            for ($i = 0; $i < count($choice); $i++) {
                $this->scoreAnswer[$i] = $choice[$i]->score;
                $this->choiceAnswer[$i] = $choice[$i]->answer;
            }
        }
    }

    public function create()
    {
        $question = PretestQuestion::create($this->question);
        if ($this->question['question_type']==1) {
            for ($i = 0; $i < count($this->scoreAnswer); $i++) {
                PretestQuestionChoice::create([
                    'answer' => $this->choiceAnswer[$i],
                    'score' => $this->scoreAnswer[$i],
                    'pretest_question_id' => $question->id
                ]);
            }
        }
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data entered successfully',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
    }

    public function update()
    {
        PretestQuestion::find($this->dataId)->update($this->question);
        PretestQuestionChoice::wherePretestQuestionId($this->dataId)->delete();
        if ($this->question['question_type']==1) {
            for ($i = 0; $i < count($this->scoreAnswer); $i++) {
                PretestQuestionChoice::create([
                    'answer' => $this->choiceAnswer[$i],
                    'score' => $this->scoreAnswer[$i],
                    'pretest_question_id' => $this->dataId
                ]);
            }
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

        return view('livewire.pretest-form-question');
    }
}
