@extends('layouts/content')
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('header-right')
    @component('component/navbar/header-right')
        @auth
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="/userfile/gethtml?dir={{ $data->data['dir'] }}&dirid={{$data->data['dirid']}}">edit</a>
            </li>
        @endauth
    @endcomponent
@endsection
@section('sidebar')
    @component('component/navbar/sidebar')
        @foreach ($data->data['html'] as $item)
        <li class="nav-item"><h5><a href="/storage/{{ltrim($item->url,'/public/x')}}" target="iframe">{{$item->name}}</a></h5></li>
        @endforeach
    @endcomponent
@endsection
