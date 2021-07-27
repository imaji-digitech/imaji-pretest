<div>
    <div class="row p-3">
        <div class="col-lg-12 col-sm-12 ">
            @foreach(auth()->user()->userAnswers as $index=>$q)
                <div class="card">
                    <div class="card-header {{($q->score!=0)? 'bg-primary':''}} ">
                        <h4 class="{{($q->score!=0)? 'text-white':''}} ">{{ $index+1 .". ".$q->question->title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <fieldset id="{{ $q->id }}">
                            @foreach($q->question->questionChoices as $c)
                                <div class="form-check">
                                    <input class="form-check-input" name="{{ $q->id }}" type="radio"
                                           id="{{ \Illuminate\Support\Str::slug($q->question->title.$c->answer) }}"
                                           value="{{ $c->score }}"
                                           wire:click="submitAnswer({{ $q->id }}, '{{ $c->score }}')"
                                           {{ ($q->score==$c->score)? 'checked':'' }}>
                                    <label class="form-check-label"
                                           for="{{ \Illuminate\Support\Str::slug($q->question->title.$c->answer) }}">{{ $c->answer }}</label>
                                </div>
                            @endforeach
                            </fieldset>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            @endforeach
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" value="Submit" class=" btn  btn-danger dropdown-item has-iconç" >
                        <center>Submit</center>
                    </button>
                </form>
        </div>

    </div>

</div>
