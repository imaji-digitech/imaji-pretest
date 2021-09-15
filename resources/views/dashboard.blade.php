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
            <a href="{{ route('admin.exam.instruction',1) }}" class="btn btn-primary">
                Lakukan pretest
            </a>

            <br>
            <a href="{{ route('admin.exam.calistung') }}" class="btn btn-primary">
                Lakukan calistung
            </a>

        </div>
    </div>
</x-app-layout>
