@extends('layouts.app')
@section('head')
@endsection
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('header-right')
    @component('component/navbar/header-right')
        @auth
            <li class="nav-item">
                <a class="nav-link btn btn-link" data-toggle="modal" data-target="#createModal">create</a>
            </li>
        @endauth
    @endcomponent
@endsection
@section('modal')
@component('component.modal.create') 
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
            @component('component.card.card',['data'=>$link]) 
        <div class="card-footer">
            <a onclick="changeData('form{{$link->id}}')" class="edit">
                <span class="iconfont icon-tianxie"></span>
            </a>
            <a class="back" style="display: none" onclick="rechangData('form{{$link->id}}')">
                <span class="iconfont icon-chehuisekuai"></span>
            </a>
            <a onclick="updatedata('form{{$link->id}}')" class="float-right enter" style="display: none">
                <span class="iconfont icon-duigou"></span>
            </a>
            <a class='float-right next' target="_blank" href='http://{{$link->link }}'>
                <span class="iconfont icon-xiayibu"></span>
            </a>
        </div>
            @endcomponent
    @endforeach
    <div class="col-12">
    <hr style="border-top:solid 1px #fff;" >
        {{ $data->data->links() }}
    </div>
</div>

</div>
@endsection
@section('script')
@parent
<script>
function updateData(id){
    console.log(id);
    var form=document.querySelector('#'+id);
    var formData = new FormData(form);
    formData.append('_token',"{{ csrf_token() }}")
    getPost(formData,'/link/update','default');
}
function showDetail(a){
	$('.modal-title').html($(a).siblings(".title").html());
	$('.modal-title').children('h5').attr('class','');
	$('.modal-title').children('a').attr('class','');
    $('.modal-body>div').html($(a).html());
    $('#detail').modal('show');
    $('#detail').trigger('focus');
}
function createlink(){
    var form = document.querySelector("#createlink");
    var formData = new FormData(form);
    getPost(formData,'/link/create','default');
}
</script>
@endsection
