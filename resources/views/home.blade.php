@extends('layouts.app')
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('content')
<div class="container-fluid ">
  <div class="row" style="padding:0">
    <div class="jumbotron jumbotron-fluid col-12">
      <div class="container text-center" > 
        <h1 class="display-3">欢迎</h1>
        <h3>来到 Cmfac.com</h3>
        <hr class="my-4">
        <p>此网站是用来学习的,目前它以两种方式储存知识,Link用来保存其他网站的知识,通过一个链接指向网站地址.Libary用来保存自己的笔记,不过使用你得先学会.MD语言.本站的所有内容都是开源的.所有人都可以对所有内容进行编辑.啊 写了一半的权限管理然后放弃了,一是太简单,二是没必要把自己关在一个小房间里.世界真的特别大啊</p>
      </div>
    </div> 
</div>
</div>
@endsection
