<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data question') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Question')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="pretest-question" :model="$question" />
    </div>
</x-app-layout>
