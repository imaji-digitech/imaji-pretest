<x-app-layout>
    <x-slot name="header_content">
        <h1>Exam</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Exam</a></div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <livewire:pretest-exam aspect="{{$id}}"/>
    </div>
</x-app-layout>
