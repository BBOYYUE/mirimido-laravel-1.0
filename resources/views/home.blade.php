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
        <p>此网站是用来学习的,目前它以两种方式储存知识,Link用来保存其他网站的知识,通过一个链接指向网站地址.Libary用来保存自己的笔记,不过使用你得先学会.MD语言.本站的所有内容都是开源的.所有人都可以对所有内容进行编辑.啊 写了一半的权限管理然后放弃了.因为别的地方已经实现了，没必要在做一次.</p>
      </div>
    </div> 
</div>
<div class="top text-center" style="position: relative;margin:0 auto;$(window).width()/2"></div>
<hr color="#fff" style="position: relative;">
</div>
    <script src="/js/jquery.js"></script>
<script>
  $(window).ready(function(){
  var audio= new Audio("http://cmfac.com/storage/music.mp3");//这里的路径写上mp3文件在项目中的绝对路径
  audio.play()
  html = "<div style='width:1px;background:#fff;display:inline-block;margin:1px;'></div>";
  for(i=0;i<$(window).width()/6;i++){ 
    $('.top').append(html);
  }
  a = (function(){
    for(i=0;i<$(window).width()/4;i++){
      $('.top').children('div').eq(i).height(Math.floor(Math.random()*5)+'rem');
    }
    
  window.requestAnimationFrame(a);
  })
  window.requestAnimationFrame(a);
  });
</script>
@endsection
