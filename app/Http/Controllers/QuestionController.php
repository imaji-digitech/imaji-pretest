<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        return view('pages.question.index',[
            'question'=>Question::class
        ]);
    }
    public function create(){
        return view('pages.question.create');
    }
    public function edit($id){
        return view('pages.question.edit',compact('id'));
    }
}
