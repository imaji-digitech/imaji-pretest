<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DataExam extends Component
{
    public function render()
    {
//        $data=DB::select('SELECT users.name, sum(user_answers.score) as score,aspects.title, aspects.id FROM users
//JOIN user_answers ON user_answers.user_id=users.id
//JOIN questions ON questions.id=user_answers.question_id
//JOIN aspects ON aspects.id = questions.aspect_id
//GROUP BY users.name, aspects.title,aspects.id
//ORDER BY name, aspects.id');
        $data=User::whereRole(4)->get();
        $user=[];
        foreach ($data as $d){
            $d->basic=0;
            $d->nonbasic=0;
            foreach ($d->userAnswers as $d2){
                if ($d2->question->aspect_id==1){
                    $d->basic+=$d2->score;
                }else{
                    $d->nonbasic+=$d2->score;
                }
            }
        }
//        dd($data);
//        $c=[0,6,10,6,6,7];

        return view('livewire.data-exam', compact('data'));
    }
}
