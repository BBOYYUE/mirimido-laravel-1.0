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
            <div  class="card-img" alt="..." style="height: 200px;"></div>
            <div class="card-img-overlay">
                <h5 class="card-title">{{$item->name}}</h5>
                <hr class='hr'/>
                <a  href="/userhtml/gethtml?dir={{$item->url}}&dirid={{$item->id}}" class="card-text">{{$item->summary}}</a>
                <p class="card-text">Last updated {{$item->updated_at}}</p>
            </div>
                <div class="card-footer" style="display: none">
                    <span class="iconfont icon-tianxie"></span>
                <a  href="/userhtml/gethtml?dir={{$item->url}}&dirid={{$item->id}}" class="float-right">
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
    function createdir(){
        var form = document.querySelector("#createdir");
        var formData = new FormData(form);
        getPost(formData,'createdir/gethtml','default');
    }
</script>   
@endsection
