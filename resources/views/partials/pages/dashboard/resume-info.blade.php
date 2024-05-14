<div class="row">
    @foreach ($resume as $d)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <x-card.card :content="$d" />
        </div>
    @endforeach
</div>
