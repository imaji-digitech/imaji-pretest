<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PretestDataExam extends Component
{
    public function render()
    {
        $data = User::whereRole(4)->get();
        foreach ($data as $d) {
            $d->wa = 0;
            $d->ge = 0;
            $d->ra = 0;
            $d->an = 0;
            $d->wu = 0;
            $d->me = 0;
            foreach ($d->pretestUserAnswers as $d2) {
                if ($d2->pretestQuestion->pretest_aspect_id == 1) {
                    $d->wa += $d2->score;
                } else if ($d2->pretestQuestion->pretest_aspect_id == 2) {
                    $d->ge += $d2->score;
                } else if ($d2->pretestQuestion->pretest_aspect_id == 3) {
                    $d->ra += $d2->score;
                } else if ($d2->pretestQuestion->pretest_aspect_id == 4) {
                    $d->an += $d2->score;
                } else if ($d2->pretestQuestion->pretest_aspect_id == 5) {
                    $d->wu += $d2->score;
                } else if ($d2->pretestQuestion->pretest_aspect_id == 6) {
                    $d->me += $d2->score;
                }
            }
        }
        return view('livewire.pretest-data-exam', compact('data'));
    }
}
