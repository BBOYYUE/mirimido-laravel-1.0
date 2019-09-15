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
           @component('component.card.card',['data'=>$item])
        <div class="card-footer">
            <a onclick="changeData('form{{$item->id}}')" class="edit">
                <span class="iconfont icon-tianxie"></span>
            </a>
            <a class="back" style="display: none" onclick="rechangData('form{{$item->id}}')">
                <span class="iconfont icon-chehuisekuai"></span>
            </a>
            <a onclick="updatedata('form{{$item->id}}')" class="float-right enter" style="display: none">
                <span class="iconfont icon-duigou"></span>
            </a>
            <a class='float-right next' target="_blank" href='/userhtml/gethtml?dir={{$item->url }}&dirid={{$item->id}}'>
                <span class="iconfont icon-xiayibu"></span>
            </a>
        </div>
           @endcomponent
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
function updateData(id){
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
