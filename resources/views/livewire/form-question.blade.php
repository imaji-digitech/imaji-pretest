<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">

        <x-input type="text" title="Question" model="question.title"/>
        <x-select :options="$optionAspect" :selected="$question['aspect_id']" title="Aspect question" model="question.aspect_id"/>

        <x-input type="text" title="Answer A" model="choiceAnswer.0"/>
        <x-input type="number" title="Score A" model="scoreAnswer.0"/>

        <x-input type="text" title="Answer B" model="choiceAnswer.1"/>
        <x-input type="number" title="Score B" model="scoreAnswer.1"/>

        <x-input type="text" title="Answer C" model="choiceAnswer.2"/>
        <x-input type="number" title="Score C" model="scoreAnswer.2"/>

        <x-input type="text" title="Answer D" model="choiceAnswer.3"/>
        <x-input type="number" title="Score D" model="scoreAnswer.3"/>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
