<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Create new question') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Question')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question.index') }}">{{__('Create new question')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:pretest-form-question action="create"/>
    </div>
</x-app-layout>
