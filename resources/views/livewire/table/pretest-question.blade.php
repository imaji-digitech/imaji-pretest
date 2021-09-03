<div>
    <x-data-table :data="$data" :model="$questions">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('aspect_id')" role="button" href="#">
                        Aspek
                        @include('components.sort-icon', ['field' => 'aspect_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Soal
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>

                <th>Aksi</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($questions as $question)
                <tr x-data="window.__controller.dataTableController({{ $question->id }})">
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->pretestAspect->title }}</td>
                    <td>{!! $question->title !!} </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.pretest-question.edit',$question->id) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
