@extends('layouts.home')
@section('head')
<style>
 iframe{
   width:100%;
 }   
</style>
@endsection
@section('header-left')
@component('component/navbar/header-left')
@endcomponent
@endsection
@section('modal')
<div class="modal" id="help" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <img src="/images/help.jpg" width="100%"/>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid showview" style="overflow-x:auto;height:100%">

<div class="firstview">
    <div class="jumbotron jumbotron-fluid home-jumbotron" style="background:#fff;margin:1rem 0 0 0;">
      <div class="container text-center">
        <h1 class="display-3">欢迎</h1>
        <h3>来到 萌向星空</h3>
        <hr class="my-4">
        <p>此网站是关于学习的,它被设计用来记笔记和查询资料:link 通常用来保存你在其他网站的很零碎的知识;libary 可以很方便的进行知识的汇总;本站现在所有的内容的是公开的,如果你很喜欢网站的设计风格,而你的内容又必须保密的话,你可以联系开发者添加功能; </p>
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#help">点击支持开发者</button>
      </div>
    </div>
</div>
<div class="thirdview" style="width:100%;display:block">
  <div class="animate text-center">
    <span style="width:0;height:100%;display:inline-block"></span>
  </div>
  <div class="progress" style="height: 1px;">
      <div class="progress-bar music-progress-bar" role="progressbar"  aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <ul class="list-group list-group-flush text-center music-list" style="margin:0 auto;">
      <li class="list-group-item" onclick=getMusic('{{ asset("music/music_1.mp3")}}')>ニャースのバラード (喵喵的叙事曲)</li>
      <li class="list-group-item" onclick=getMusic('{{ asset("music/music_2.mp3")}}')>富士山下（爱情转移）钢琴伴奏纯音乐版</li>
      <li class="list-group-item" onclick=getMusic('{{ asset("music/music_3.mp3")}}')>无羁(钢琴独奏版)</li>
      <li class="list-group-item" onclick=getMusic('{{ asset("music/music_4.mp3")}}')>時を越えて かごめ (M-8PanFI) </li>
      <li class="list-group-item" onclick=getMusic('{{ asset("music/music_5.mp3")}}')>李行亮 - 原来都是梦 </li>
</ul>
<style>
  .list-group-item{
    background:rgba(203,200,246,0);
    color: #fff;
  }
  iframe{
    height: 100%;
  }
  .mainview{
    position: fixed;
    width: 100%;
    height: 100%;
    top:45px;
    display: none;
    z-index:-999;
  }
  </style>
</div>
<div class="fourthview card" style="position: relative;top:90px;">
    <div class="card-header">
      更新日志:
    </div>
    <div class="card-body">
      更新日期 | 更新内容 <br>
      2019-10-10 | 重新设计了主页;新增了 my book; 新增了一首中文歌 ; 
    </div>
    <div class="card-footer">
        开发者的个人邮箱:bboyxiaoyue@outlook.com 来信请注明你的身份和来意;
    </div>
</div>
 <div class="box" style="width:100%;"></div> 
</div>

<div class="secondview" style="background:#fff;position:fixed;width:100%;z-index:11;">
  @component('component/navbar/main')
  @endcomponent
</div>
<div class="mainview">
	  <div id="page-content" id="myTabContent" >
      </div>
</div>
<div class="backgroundview" style="position: fixed;top:0;z-index:-1;">
    <div class='particle-network-animation'></div>
  </div>
<script src="/js/jquery.js"></script>
<script src="/js/skrollr.js"></script>
<script src="/js/tab.js"></script>
<script src="/js/background-img.js"></script>
<script src="/js/audio-amimate.js"></script>
<script type="text/javascript">
$('.menu').children('a').click(function(){
    $('.mainview').css('z-index',10)
    console.log(1)
  })
$(".menu a").tab();
$('.box').height(150);
$('.show-secondview').click(function(){
  if($('.secondview').css('bottom')!='0px'){
    $('.secondview').animate({bottom:0},200);
    $('.mainview').hide();    
    $('.show-secondview').html('<span class="iconfont icon-shangjiantou"></span>');
  }else{
    $('.secondview').animate({bottom:$(window).height()-45},200);
    $('.mainview').show();    
    $('.show-secondview').html('<span class="iconfont icon-xiajiantou"></span>');
  }
})
    $('.secondview').animate({bottom:0},500);
</script>
@endsection

