@extends('layouts.admin')
@section('title',"Новости")
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <x-admin.navigation :links="$links" />
                <x-news::settings />
            </div>
        </div>
    </div>
@endsection
