@props(['content' => []])

<div class="card">
    <div class="card-body p-3">
        <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <x-card.title>{{ $content['title'] }}</x-card.title>
                    <x-card.number>{{ $content['number'] }}</x-card.number>
                    <x-card.since @class([
                        'text-sm',
                        'font-weight-bolder',
                        'text-success' => $content['increst'],
                        'text-danger' => !$content['increst'],
                    ])
                        percentage="{{ $content['percentage'] }}">{{ $content['since'] }}</x-card.since>
                </div>
            </div>
            <div class="col-4 text-end">
                <x-card.icon iconBg="{{ $content['icon-bg'] }}" icon="{{ $content['icon'] }}" />
            </div>
        </div>
    </div>
</div>
