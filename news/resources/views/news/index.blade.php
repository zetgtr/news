@extends('layouts.admin')
@section('title',"Новости")
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <x-admin.navigation :links="$links" />
                <x-news::news />
            </div>
        </div>
    </div>
@endsection
