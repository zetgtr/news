{{-- @dd($news) --}}
@php
use Carbon\Carbon;
$formattedDate = Carbon::parse($news->created_at)->locale('ru')->isoFormat('D MMMM YYYY');

$news->setCountShow();
@endphp
<div class="news__category">
    <div class="container news-container">
        <x-front.breadcrumbs :breadcrumbs="$news->getBredcrambs()" flag='true' />
        <h1 style="color: #000;">{!! $news->title !!}</h1>
        <div class="main">
            <div class="news__header__item text-small text-gloom position-relative">
                <div class="news__header-item">
                    <i class="far fa-clock"></i>
                    {{ $formattedDate }}
                </div>
                <div class="news-item__info">
                    <div class="news-item__eye">
                        <i class="far fa-eye"></i>
                        {{ $news->show }}
                    </div>
                </div>
                @auth
                <a target="_blank" class="news-item__edit" href="{{ route("admin.news.edit", [
                            "news" => $news
                            ]) }}">
                    <i class="far fa-edit"></i>
                    <span>Редактировать</span>
                </a>
                @endauth
            </div>

            <div class="news__content news-text">
                {!! $news->content !!}
                @if(($news->images) !== "[null]")
                <div class="news-slider-container">
                    <div class="news-slider swiper">
                        <div class="swiper-wrapper">
                            @foreach(json_decode($news->images) as $image)
                            <div class="swiper-slide">
                                <div class="item">
                                    <div class="img-container">
                                        <img src="{{ $image }}" alt="Slide Image">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                @endif
                @if($news->getOther())
                <div class="other-news">
                    <div class="other-news__header">
                        <h2>Другие нвоости</h2>
                        <div class="other-news__btns">
                            <div class="other__prev">
                                <svg width="90" height="52" viewBox="0 0 90 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.4 0.457546C28.9 0.457546 28.4 0.657546 28 0.957546L0.7 24.3575C0.3 24.7575 0 25.3575 0 25.9575C0 26.5575 0.3 27.1575 0.7 27.5575L28 50.9575C28.9 51.7575 30.2 51.6575 31 50.7575C31.8 49.8575 31.6 48.5575 30.8 47.7575L5.4 25.9575L30.8 4.15754C31.7 3.35754 31.8 2.05754 31 1.15754C30.6 0.757543 30 0.457546 29.4 0.457546Z" fill="#231F20"></path>
                                    <path d="M87.9 23.8575H2.1C0.9 23.8575 0 24.8575 0 25.9575C0 27.1575 0.9 28.0575 2.1 28.0575H87.9C89.1 28.0575 90 27.0575 90 25.9575C90 24.7575 89.1 23.8575 87.9 23.8575Z" fill="#231F20"></path>
                                </svg>
                            </div>
                            <div class="other__next">
                                <svg width="90" height="52" viewBox="0 0 90 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M60.6 0.457546C61.1 0.457546 61.6 0.657546 62 0.957546L89.3 24.3575C89.7 24.7575 90 25.3575 90 25.9575C90 26.5575 89.7 27.1575 89.3 27.5575L62 50.9575C61.1 51.7575 59.8 51.6575 59 50.7575C58.2 49.8575 58.4 48.5575 59.2 47.7575L84.6 25.9575L59.2 4.15754C58.3 3.35754 58.2 2.05754 59 1.15754C59.4 0.757543 60 0.457546 60.6 0.457546Z" fill="#231F20"></path>
                                    <path d="M2.1 23.8575H87.9C89.1 23.8575 90 24.8575 90 25.9575C90 27.1575 89.1 28.0575 87.9 28.0575H2.1C0.899998 28.0575 0 27.0575 0 25.9575C0 24.7575 0.899998 23.8575 2.1 23.8575Z" fill="#231F20"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="swiper other-slider">
                        <div class="swiper-wrapper">
                            @foreach ($news->getOther() as $item)
                            <div class="swiper-slide">
                                <div class="item">
                                    <x-news::front.macro :item="$item" flag='true' />
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif


                <div class="news__footer-item">
                    <a href="{{ route('news') }}" class="news-footer-item-back">
                        <i class="fas fa-caret-left"></i>
                        <span>Назад</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@vite('resources/js/news/slider.js')
