<div wire:poll="check">
    <div class="row p-3">
        <div class="col-lg-12 col-sm-12 ">
            @foreach($questions as $index=>$q)
                <div class="card">
                    <div class="card-header {{($q->answer!=null or $q->answer!='')? 'bg-primary':''}} ">
                        <h4 class="{{($q->answer!=null or $q->answer!='')? 'text-white':''}} ">
                            {{$index+1}}<br>
                            {!! $q->pretestQuestion->title !!}
                        </h4>
                    </div>
                    <div class="card-body" style="margin-top: 0;margin-bottom: 0;padding-top: 10px;padding-bottom: 0">
                        <div class="form-group">
                            @if($q->pretestQuestion->question_type==1)
                                <fieldset id="{{ $q->id }}">
                                    @php($pg=1)
                                    <div class="row">
                                        @foreach($q->pretestQuestion->pretestQuestionChoices as $c)
                                            <div class="form-check" style="width: 20%">
                                                <input class="form-check-input" name="{{ $q->id }}" type="radio"
                                                       id="{{ \Illuminate\Support\Str::slug($q->pretestQuestion->title.$c->answer) }}"
                                                       value="{{ $pg }}"
                                                       wire:click="submitAnswer({{ $q->id }},{{ $c->score }},{{ $pg }})"
                                                    {{ ($q->answer==$pg)? 'checked':'' }}>
                                                <label class="form-check-label"
                                                       for="{{ \Illuminate\Support\Str::slug($q->pretestQuestion->title.$c->answer) }}">{{ $c->answer }}</label>
                                            </div>
                                            @php($pg++)
                                        @endforeach
                                    </div>
                                </fieldset>
                            @elseif($q->pretestQuestion->question_type==2)
                                @for($i=0;$i<10;$i++)
                                    <div class="form-check form-check-inline" style="width: 8%">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                               value="{{$i}}"
                                               name="check"
                                               style="width: 30px;height: 30px"
                                               {{ (in_array($i, explode(';',$q->answer)) and $q->answer!=null) ?'checked':'' }}
                                               wire:click="submitAnswerCheckbox({{$q->id}},{{$i}})"
                                        >

                                        <label class="form-check-label" style="font-size: 20px"
                                               for="inlineCheckbox2">{{$i}}</label>
                                    </div>
                                @endfor
                            @else
                                <div class="mb-3">
                                    <input type="text" class="form-control" style="width: 80%;display: inline"
                                           wire:model="essay.{{$q->id}}">
                                    <button class="btn btn-primary ml-3" wire:click="submitAnswerEssay({{$q->id}})">
                                        Simpan
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer" style="padding-top: 0;padding-bottom: 0">
                    </div>
                </div>
            @endforeach
            {{--            <a href="{{route('admin.dashboard')}}" class="btn btn-success" style="width: 100%">Selesai</a>--}}
        </div>
    </div>

</div>
