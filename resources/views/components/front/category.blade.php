@php
    $breadcrumbs = [["title"=>"Главная", "url" => "home"],["title" => 'Новости', "url" => 'news']];
@endphp
<div class="news__category">
    <div class="container">
        <x-front.breadcrumbs :breadcrumbs="$breadcrumbs"  flag='true'/>
        <h1>{{ $settings->title }}</h1>
        <div class="row news-item--row">
            @foreach ( $news as $item)
                <div class="col-lg-4 col-sm-6 wow fadeIn">
                    <x-news::front.macro :item="$item" />
                </div>
            @endforeach
            <div>
                {{ $news->links() }}
            </div>
        </div>
    </div>
</div>
