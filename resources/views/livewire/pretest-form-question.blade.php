<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-summernote type="text" title="Question" model="question.title"/>
        <x-select :options="$optionAspect" :selected="$question['pretest_aspect_id']" title="Aspek pertanyaan" model="question.pretest_aspect_id"/>
        <x-select :options="$optionType" :selected="$question['question_type']" title="Tipe Pertanyaan" model="question.question_type"/>
        @if($question['question_type']==1)
        <x-input type="text" title="Jawaban A" model="choiceAnswer.0"/>
        <x-input type="number" title="nilai A" model="scoreAnswer.0"/>

        <x-input type="text" title="Jawaban B" model="choiceAnswer.1"/>
        <x-input type="number" title="nilai B" model="scoreAnswer.1"/>

        <x-input type="text" title="Jawaban C" model="choiceAnswer.2"/>
        <x-input type="number" title="nilai C" model="scoreAnswer.2"/>

        <x-input type="text" title="Jawaban D" model="choiceAnswer.3"/>
        <x-input type="number" title="nilai D" model="scoreAnswer.3"/>

        <x-input type="text" title="Jawaban E" model="choiceAnswer.4"/>
        <x-input type="number" title="nilai E" model="scoreAnswer.4"/>
        @elseif($question['question_type']==2)
            <x-input type="text" title="Jawaban benar" model="question.answer"/>
        @elseif($question['question_type']==3)
        @endif
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
