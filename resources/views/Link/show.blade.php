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
                <a class="nav-link btn btn-link" data-toggle="modal" data-target="#headerModal">create</a>
            </li>
        @endauth
    @endcomponent
@endsection
@section('modal')
@component('component.modal.header') 
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增链接</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createlink">
                    @csrf
                    <div class="form-group">
                        <label for="title">标题</label>
                            <input name="title" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Enter title">
                        <small id="titleHelp" class="form-text text-muted">在这里输入标题</small>
                    </div>
                    <div class="form-group">
                        <label for="title">链接</label>
                            <input name="link" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Enter link">
                        <small id="titleHelp" class="form-text text-muted">在这里输入链接</small>
                    </div>
                    <div class="form-group">
                        <label for="summary">简介</label>
                        <textarea name="summary" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Enter summary"></textarea>
                    </div>
               </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createlink()">Save changes</button>
            </div>
@endcomponent
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach ($data->data as $link)
        <div class='col-lg-3 col-md-4 col-sm-12' id="card">
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
        <div class="col-12">
        <hr style="border-top:solid 1px #fff;" >
        <div>
        {{ $data->data->links() }}
        </div>
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
@section('script')
@parent
<script>
function createlink(){
    var form = document.querySelector("#createlink");
    var formData = new FormData(form);
    getPost(formData,'/link/create','default');
}
</script>
@endsection
