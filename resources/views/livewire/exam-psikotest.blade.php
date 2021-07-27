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
                                <div class="col-sm-12 row m-3">
                                    <input class="form-check-input col-sm-2" name="{{ $q->id }}" type="radio"
                                           id="{{ \Illuminate\Support\Str::slug($q->question->title.$c->answer) }}"
                                           value="{{ $c->score }}"
                                           wire:click="submitAnswer({{ $q->id }}, '{{ $c->score }}')"
                                           {{ ($q->score==$c->score)? 'checked':'' }}>
                                    <label class="form-check-label col-sm-9"
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
                    <a href="{{ route('logout') }}" class=" btn  btn-danger dropdown-item has-iconç" >
                        <center>Submit</center>
                    </a>
                </form>
        </div>

    </div>

</div>
