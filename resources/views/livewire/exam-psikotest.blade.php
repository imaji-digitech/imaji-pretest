<div>
    <div class="row p-3">
        <div class="col-lg-12 col-sm-12 ">
            @foreach(auth()->user()->userAnswers as $index=>$q)
                <div class="card">
                    <div class="card-header {{($q->answer!=0)? 'bg-primary':''}} ">
                        <h4 class="{{($q->answer!=0)? 'text-white':''}} ">{!! $q->question->title !!}</h4>
                    </div>
                    <div class="card-body" style="margin-top: 0;margin-bottom: 0;padding-top: 10px;padding-bottom: 0">
                        <div class="form-group">
                            <fieldset id="{{ $q->id }}">
                                @php($pg=1)
                            @foreach($q->question->questionChoices as $c)
                                <div class="form-check">
                                    <input class="form-check-input" name="{{ $q->id }}" type="radio"
                                           id="{{ \Illuminate\Support\Str::slug($q->question->title.$c->answer) }}"
                                           value="{{ $pg }}"
                                           wire:click="submitAnswer({{ $q->id }},{{ $c->score }},{{ $pg }})"
                                           {{ ($q->answer==$pg)? 'checked':'' }}>
                                    <label class="form-check-label"
                                           for="{{ \Illuminate\Support\Str::slug($q->question->title.$c->answer) }}">{{ $c->answer }}</label>
                                </div>
                                @php($pg++)
                            @endforeach
                            </fieldset>
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top: 0;padding-bottom: 0">
                    </div>
                </div>
            @endforeach
                <a href="{{ route('admin.dashboard') }}"></a>
        </div>
    </div>

</div>
