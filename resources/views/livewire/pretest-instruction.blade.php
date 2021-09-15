<div>
    <div class="row p-3">
        <div class="col-lg-12 col-sm-12 ">
            <div>
                {!! $description->description !!}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            setTimeout(function () {
                window.location.href = '{{route('admin.exam.pretest',$aspect)}}';
            }, 180000);
        })
    </script>
</div>
