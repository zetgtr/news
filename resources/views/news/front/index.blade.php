@extends('layouts.inner')
@section('title',$settings->title)
@section('description',$settings->description)
@section('keywords',$settings->keywords)
@section('page',true)
@section('content')
<div class="content">
    {{-- <x-front.breadcrumbs :breadcrumbs="$breadcrumbs" /> --}}
    {{-- <h2>{{ $title }}</h2> --}}

    <x-news::front.category :news="$news" :settings="$settings"/>
</div>

@endsection
