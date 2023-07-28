{{-- @dd($news) --}}
@extends('layouts.inner')
@section('title',$news->seoTitle)
@section('description',$news->seoDescription)
@section('keywords',$news->seoKeywords)
@section('page',true)
@section('content')
<div class="content">

    <x-news::front.item :news="$news" />
</div>

@endsection
