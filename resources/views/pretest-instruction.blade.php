<x-app-layout>
    <x-slot name="header_content">
        <h1>Calistung</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Calistung</a></div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-4">
            <livewire:pretest-instruction aspect="{{$id}}"/>
            <a href="{{route('admin.exam.pretest',$id)}}" class="btn btn-primary">Lakukan ujian</a>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            setTimeout(function () {
                window.location.href = data;
            }, 180000);
        });
    </script>
</x-app-layout>
