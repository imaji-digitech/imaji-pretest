<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Update question') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Question')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.question.index') }}">{{__('Update new question')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-question action="update" :dataId="$id"/>
    </div>
</x-app-layout>
