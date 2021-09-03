<div id="form-create" class=" card p-4">
    <form wire:submit.prevent="{{$action}}">
        <x-input type="text" title="Judul" model="aspect.title"/>
        <x-input type="number" title="Waktu pengerjaan" model="aspect.time"/>
        <x-summernote type="text" title="Question" model="aspect.description"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
