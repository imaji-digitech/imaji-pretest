<div>
    @php($name='')
    @foreach($data as $d)
        @if($d->name!=$name)
            <br><br>
            @php($name=$d->name)
            <div class="mb-4">
                <div class="text-small float-right font-weight-bold text-muted"></div>
                <div class="font-weight-bold mb-1">{{ $d->name }}</div>
            </div>
        @endif
        <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">{{ ($d->score/($c[$d->id]*4)*100<50)?'Rendah':($d->score/($c[$d->id]*4)*100<80)?'Menengah':'Tinggi' }} ( {{$d->score/($c[$d->id]*4)*100}}%) </div>
            <div class="font-weight-bold mb-1">{{ $d->title }}</div>
            <div class="progress" data-height="10" style="height: 10px;">
                <div class="progress-bar" role="progressbar" data-width="{{$d->score/($c[$d->id]*4)*100}}%"
                     aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
            </div>
        </div>
    @endforeach

</div>
