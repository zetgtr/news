@php
use Carbon\Carbon;
$formattedDate = Carbon::parse($item->created_at)->locale('ru')->isoFormat('D MMMM YYYY');
@endphp
<div class=" news-item">
    @if($item->images)
    <div class="news-item__image">
        <a class="image image_alive" href="{{ url('news/' . $item->url) }}">
            <img src="{{ asset('assets/img/new001.jpg') }}" alt="">
        </a>
    </div>
    @endif
    <a href="{{ url('news/' . $item->url) }}" class="news-item__upkeep">
        <div class="news-item__header">
            <div class="news-item__date">
                {{ $formattedDate }}
            </div>
            @if(empty($flag))
            <div class="news-item__info">
                <div class="news-item__eye">
                    <i class="far fa-eye"></i>
                    {{ $item->show }}
                </div>
            </div>
            @endif
        </div>
        <div class="news-item__title">
            <span>{!! htmlspecialchars_decode(e($item->title)) !!}</span>
        </div>
        @if(empty($flag))
        <div class="news-item__content">{!! $item->description !!}</div>
        @endif
    </a>
</div>
