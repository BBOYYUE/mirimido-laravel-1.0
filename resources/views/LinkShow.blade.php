@extends('layouts.app')
@section('myLoginMenu')
    <li class="nav-item"><a href="/link/create" class="nav-link">create</a></li>
@endsection
@section('content')
<div class=".container-fluid">
    <div class="row linkCard">
        @foreach ($links as $link)
        <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
		<div class= 'title row'>
                <h5 class='col-7'>
                    {{ $link->title }}
		</h5>
                	<a  class='col-5 btn btn-link' style="width:100%" href='http://{{$link->link }}'>{{$link->link }}</a>
		</div>
                <hr>
               <p class="lead" onclick="showDetail(this)">{{ $link->summary }}</p>
                <hr>
                  {{ $link->user }} 
                    <small>{{ $link->created_at }}</small>
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
function tip(tip){
        alert(tip);
}
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
