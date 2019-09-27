@extends('layouts/content')
<!--
@/section('header-left')
    @/component('component/navbar/header-left')
    @/endcomponent
@/endsection
@/section('header-right')
    @/component('component/navbar/header-right')            
        @/auth
            <li class="nav-item">
                <a class="nav-link btn btn-link" data-toggle="modal" data-target="#createModal">create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-link" href="/userhtml/gethtml?dir={{ $data->data['dir'] }}&dirid={{ $data->data['dirid']}}">show</a>
            </li>
        @/endauth
    @/endcomponent
@/endsection
        -->
@section('modal')
   @component('component/modal/create')
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">添加新的章节</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createfile">
                    @csrf
                    <div class="form-group">
                        <label for="title">标题</label>
                        <input type="text" class="form-control" id="title" name='title' aria-describedby="titlelHelp"
                            placeholder="Enter title">
                        <small id="titleHelp" class="form-text text-muted">在这里输入标题</small>
                        <input type='hidden' name='dir' value="{{ $data->data['dir'] }}"/>
                        <input type='hidden' name='dirid' value="{{ $data->data['dirid'] }}"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createfile()">Save changes</button>
            </div>
    @endcomponent
@endsection
@section('msidebar')
    @component('component/navbar/msidebar')
        @foreach ($data->data['file'] as $item)
        <li class="nav-item"><h5><a href="/showMd/gethtml?path={{$item->url}}" target="iframe">{{$item->name}}</a></h5></li>
        @endforeach
    @endcomponent
@endsection

@section('sidebar')
    @component('component/navbar/sidebar',['method'=>'file','data'=>$data])
        @foreach ($data->data['file'] as $item)
            <li class="list-group-item list-group-item-action">
                <a href="/showMd/gethtml?path={{$item->url}}" target="iframe">{{$item->name}}</a>
                <input style="display: none" name="name" class="form-control" style="width:80%;">
                <span class="iconfont icon-tianxie float-right" onclick="setUpdateName(this)"></span>
                <span class="iconfont icon-xiayibu float-right" onclick="updateFile(this,{{$item->id}})" style="display: none;"></span>
            </li>
        @endforeach
    @endcomponent
@endsection
@section('script')
@parent
<script>
function setUpdateName(obj){
    $(obj).siblings('input').val($(obj).siblings('a').text());
    $(obj).siblings('a').css('display','none');
    $(obj).css('display','none');
    $(obj).siblings('span').css({'display':'inline','top':'.3rem','position':'relative'});
    $(obj).siblings('input').css({'display':'inline','width':'80%'});
}
function updateFile(obj,id){
    $(obj).siblings('input').css('display','none');
    $(obj).css('display','none');
    $(obj).siblings('a').text($(obj).siblings('input').val());
    $(obj).siblings('span').css('display','inline');
    $(obj).siblings('a').css('display','inline');
    var formData = new FormData();
    formData.append('name',$(obj).siblings('input').val());
    formData.append('id',id);
    formData.append('_token',"{{ csrf_token() }}")
    getPost(formData,'updatefilename/gethtml','default');
}
function createfile(){
    var form = document.querySelector("#createfile");
    var formData = new FormData(form);
    getPost(formData,'createfile/gethtml','default');
}
</script>
@endsection
