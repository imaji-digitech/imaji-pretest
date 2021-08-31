<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Status</th>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
            <th scope="col">6</th>
            <th scope="col">7</th>
            <th scope="col">8</th>
            <th scope="col">9</th>
            <th scope="col">10</th>
            <th scope="col">Nilai</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $index=>$d)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>{{ $d->name }}</td>
            <td>{{ ($d->basic==5)?'Lolos':'Tidak lolos' }}</td>
            @foreach($d->userAnswers as $d2)
                <td><p style="color:{{($d2->score==1)?'green':'red'}}">{{ ($d2->answer==0)?'-':chr($d2->answer+64) }}</p></td>
            @endforeach
            <td>{{ $d->basic+$d->nonbasic }}/10</td>
        </tr>
        @endforeach

        </tbody>
    </table>

{{--        @if($d->name!=$name)--}}
{{--            <br><br>--}}
{{--            @php($name=$d->name)--}}
{{--            <div class="mb-4">--}}
{{--                <div class="text-small float-right font-weight-bold text-muted"></div>--}}
{{--                <div class="font-weight-bold mb-1">{{ $d->name }}</div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <div class="mb-4">--}}
{{--            <div class="text-small float-right font-weight-bold text-muted">{{ ($d->score/($c[$d->id]*4)*100<50)?'Rendah':($d->score/($c[$d->id]*4)*100<80)?'Menengah':'Tinggi' }} ( {{$d->score/($c[$d->id]*4)*100}}%) </div>--}}
{{--            <div class="font-weight-bold mb-1">{{ $d->title }}</div>--}}
{{--            <div class="progress" data-height="10" style="height: 10px;">--}}
{{--                <div class="progress-bar" role="progressbar" data-width="{{$d->score/($c[$d->id]*4)*100}}%"--}}
{{--                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

</div>
