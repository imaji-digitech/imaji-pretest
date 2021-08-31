<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class=" card p-4">

            @if(auth()->user()->role==1)
                <livewire:data-exam/>
            @else
                <a href="{{ route('admin.exam.psikotest') }}" class="btn btn-primary">
                    Lakukan Psikotest
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
