@extends('layouts.app')
@section('head')
<style>
    #card{
        padding:5px 5px 0 5px ;
    }
    span{
        color:#3490dc;
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
                <a class="nav-link btn btn-link" data-toggle="modal" data-target="#createModal">create</a>
            </li>
        @endauth
    @endcomponent
@endsection
@section('modal')
@component('component.modal.create')
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">添加新书</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createdir">
                    @csrf
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input type="text" class="form-control" id="name" name ="name" aria-describedby="titlelHelp"
                            placeholder="Enter title">
                        <small id="titleHelp" class="form-text text-muted">在这里输入标题</small>
                    </div>
                    <div class="form-group">
                        <label for="summary">简介</label>
                        <textarea class="form-control" id="summary" name="summary" rows="3" placeholder="Enter summary"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createdir()">Save changes</button>
            </div>
@endcomponent
@endsection
@section('content')
   <div class="container">
       <div class="row" >
        @foreach ($data->data['dir'] as $item)
        <div class='col-lg-3 col-md-4 col-sm-12' id="card">
        <div class="card bg-wirte text-dark" >
            <div  class="card-img" alt="..." style="height: 15rem;"></div>
            <div class="card-img-overlay">
            <form id="form{{$item->id}}">
                <input type="text" name="title" class="form-control" style="display: none"/>
                <h5 class="card-title">{{ $item->name }}</h5>
                <input type="hidden" name="id" value="{{$item->id}}"/>
                <hr>
                <p  class='card-text'>{{$item->summary }}</p>
                <textarea style="display: none" class="form-control" rows="4"></textarea>
            </form>
                <p class="card-text">Last updated {{$item->updated_at}}</p>
            </div>
                <div class="card-footer" style="display: none">
                <a  onclick="changeDir('form{{$item->id}}')" class="edit">
                    <span class="iconfont icon-tianxie"></span>
                </a>
                <a class="back" style="display: none" onclick="rechangDir('form{{$item->id}}')">
                    <span class="iconfont icon-chehuisekuai"></span>
                </a>
                <a  onclick="updateDir('form{{$item->id}}')" class="float-right enter" style="display: none">
                    <span class="iconfont icon-duigou"></span>
                </a>
                <a  class='float-right next' target="_blank" href='/userhtml/gethtml?dir={{$item->url}}&dirid={{$item->id}}' >
                    <span class="iconfont icon-xiayibu"></span>
                </a>
                </div>
        </div>
        </div>
        @endforeach
        <div class="col-12">
        <hr style="border-top:solid 1px #fff;" >
        {{ $data->data['dir']->links() }}
        </div>
   
       </div>
    </div>
@endsection
@section('script')
@parent
<script>
function changeDir(id){
    title = $('#'+id).children('.card-title').text();
    text = $('#'+id).children('.card-text').text();
    $('#'+id).children('.card-title').hide();
    $('#'+id).children('.card-text').hide();
    $('#'+id).children('input').val(title);
    $('#'+id).children('textarea').val(text);
    $('#'+id).children('input').show();
    $('#'+id).children('textarea').show();
    $('#'+id).parent('div').siblings('.card-footer').children('.edit').hide();
    $('#'+id).parent('div').siblings('.card-footer').children('.next').hide();
    $('#'+id).parent('div').siblings('.card-footer').children('.enter').show();
    $('#'+id).parent('div').siblings('.card-footer').children('.back').show();
}
function rechangDir(id){
    $('#'+id).children('.card-title').show();
    $('#'+id).children('.card-text').show();
    $('#'+id).children('input').hide();
    $('#'+id).children('textarea').hide();
    $('#'+id).parent('div').siblings('.card-footer').children('.edit').show();
    $('#'+id).parent('div').siblings('.card-footer').children('.next').show();
    $('#'+id).parent('div').siblings('.card-footer').children('.enter').hide();
    $('#'+id).parent('div').siblings('.card-footer').children('.back').hide();
}
function updateDir(id){
    console.log(id);
    var form=document.querySelector('#'+id);
    var formData = new FormData(form);
    formData.append('_token',"{{ csrf_token() }}")
    getPost(formData,'/link/update','default');
}

    function createdir(){
        var form = document.querySelector("#createdir");
        var formData = new FormData(form);
        getPost(formData,'createdir/gethtml','default');
    }
</script>   
@endsection
