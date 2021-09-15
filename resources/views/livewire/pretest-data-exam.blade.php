<div>
    <table class="table table-striped" style="border: 1px black solid">
        <thead style="background-color: yellow;color: black; font-weight: bold">
        <tr>
            <td rowspan="2">Nama</td>
            <td colspan="6">Nilai</td>
        </tr>
        <tr>
            <td>WA</td>
            <td>GE</td>
            <td>RA</td>
            <td>AN</td>
            <td>WU</td>
            <td>ME</td>
        </tr>
        </thead>
        @foreach($data as $d)
        <tr style="font-weight: bold">
            <td>{{$d->name}}</td>
            <td style="color: {{( ($d->wa >= 6) ? 'green' : (($d->wa >= 2) ? 'orange' : 'red') )}}" >{{$d->wa}}</td>
            <td style="color: {{( ($d->ge >= 6) ? 'green' : (($d->ge >= 2) ? 'orange' : 'red') )}}" >{{$d->ge}}</td>
            <td style="color: {{( ($d->ra >= 6) ? 'green' : (($d->ra >= 2) ? 'orange' : 'red') )}}" >{{$d->ra}}</td>
            <td style="color: {{( ($d->an >= 6) ? 'green' : (($d->an >= 2) ? 'orange' : 'red') )}}" >{{$d->an}}</td>
            <td style="color: {{( ($d->wu >= 6) ? 'green' : (($d->wu >= 2) ? 'orange' : 'red') )}}" >{{$d->wu}}</td>
            <td style="color: {{( ($d->me >= 6) ? 'green' : (($d->me >= 2) ? 'orange' : 'red') )}}" >{{$d->me}}</td>
        </tr>
        @endforeach
    </table>
</div>
