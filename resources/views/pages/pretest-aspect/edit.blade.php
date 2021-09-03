<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Update aspect') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item"><a href="#">{{__('Aspect')}}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.aspect.index') }}">{{__('Update new aspect')}}</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:pretest-form-aspect action="update" :dataId="$id"/>
    </div>
</x-app-layout>
