<?php

namespace Database\Seeders;

use App\Models\Aspect;
use App\Models\PretestAspect;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => "admin@admin",
            'password' => Hash::make("admin"),
            'role' => 1
        ]);

        Aspect::create([
            'title' => 'basic'
        ]);
        Aspect::create([
            'title' => 'non basic'
        ]);

        Question::create(['title' => '<p>B<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>C<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>D<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>E<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>…</p><p>Urutan huruf selanjutnya adalah…<br></p>',
            'aspect_id' => 1]);
        Question::create(['title' => '<p>S<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>T<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>U<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>V<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>…<br></p><p>Urutan huruf selanjutnya adalah…<br></p>',
            'aspect_id' => 1]);
        Question::create(['title' => '<p>A<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>I<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>…<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>E<span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>O<br></p><p>Huruf vocal yang hilang adalah…<br></p>',
            'aspect_id' => 2]);
        Question::create(['title' => '<img src=\"http://127.0.0.1:8000/storage/images/summernote-image/1630399220.png\" alt=\"Italian Trulli\" class=\"note-float-left\" style=\"height: 83px; float: left; width: 83px;\"><p><br></p><p>DA…U<br></p><p><br></p><p>Huruf vocal yang hilang adalah…<br></p><br>',
            'aspect_id' => 1]);
        Question::create(['title' => '<img width=\"134\" height=\"27\" src=\"blob:http://127.0.0.1:8000/92ca7ee7-90df-4fd0-8dfe-8480247d4a38\" alt=\"Text Box: Bapak berangkat bekerja\" v:shapes=\"Text_x0020_Box_x0020_2\"></span></p><p>>Berapa kata yang ada di dalam kalimat di atas?<br></span><span style=\"font-family: -webkit-standard; font-size: medium;\"></span></p>',
            'aspect_id' => 2]);
        Question::create(['title' => '<p>>Kata “Celana” terdiri dari berapa suku kata?<br></span><span style=\"font-family: -webkit-standard; font-size: medium;\"></span></p>',
            'aspect_id' => 2]);
        Question::create(['title' => '<p>>Angka apakah yang ada di antara 5 dan 7?<br></span><span style=\"font-family: -webkit-standard; font-size: medium;\"></span></p>',
            'aspect_id' => 1]);
        Question::create(['title' => '<img src=\"http://127.0.0.1:8000/storage/images/summernote-image/1630399609.png\" alt=\"Italian Trulli\" style=\"height: 109px; width: 109px;\"><p>>Terdapat berapa buah yang ada di atas pohon?</span></p>',
            'aspect_id' => 1]);
        Question::create(['title' => '<p>4 … 1 = 3</p><p>Operasi hitung apa yang tepat untuk melengkapi titik-titik di atas?<br></p>',
            'aspect_id' => 2]);
        Question::create(['title' => '<p>3 x 4 = …</p><p>Berapa hasil dari persoalan di atas?<br></p>',
            'aspect_id' => 2]);
        PretestAspect::create([
            'title'=>'WA',
            'time'=>5
        ]);
        PretestAspect::create([
            'title'=>'GE',
            'time'=>7
        ]);
        PretestAspect::create([
            'title'=>'RA',
            'time'=>10
        ]);
        PretestAspect::create([
            'title'=>'AN',
            'time'=>5
        ]);
        PretestAspect::create([
            'title'=>'WU',
            'time'=>5
        ]);
        PretestAspect::create([
            'title'=>'ME',
            'time'=>3
        ]);

    }
}
