@extends('layouts.app')
@section('head')
<style>
    #card{
        padding:5px 5px 0 5px ;
    }
</style>
@endsection
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('header-right')
    @component('component/navbar/header-right')
        @auth
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="link/create">create</a>
            </li>
        @endauth
    @endcomponent
@endsection
@section('modal')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($links as $link)
        <div class='col-md-2 col-sm-12' id="card">
        <div class="card bg-wirte text-dark" >
            <div  class="card-img" alt="..." style="height: 200px;"></div>
            <div class="card-img-overlay">
                <h5 class="card-title">{{ $link->title }}</h5>
                <a  class='card-text' target="_blank" href='http://{{$link->link }}'>{{$link->summary }}</a>
                <p class="card-text">Last updated {{ $link->created_at }}</p>
            </div>
        </div>
        </div>
       @endforeach
        <div class="col-sm-12 col-md-12 center-block">
        {{ $links->links() }}
        </div>
    </div>
</div>
<script>
function showDetail(a){
    
	$('.modal-title').html($(a).siblings(".title").html());
	$('.modal-title').children('h5').attr('class','');
	$('.modal-title').children('a').attr('class','');
    $('.modal-body>div').html($(a).html());
    $('#detail').modal('show') 
    $('#detail').trigger('focus')
}
</script>
@endsection
