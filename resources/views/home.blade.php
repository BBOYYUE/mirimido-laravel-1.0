@extends('layouts.home')
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('content')
<div class="container-fluid up" >
  <div class="body-1">
  <div class="row" style="padding:0">
    <div class="jumbotron jumbotron-fluid col-12" style="background:#fff;margin:0;">
      <div class="container text-center" > 
        <h1 class="display-3">欢迎</h1>
        <h3>来到 Cmfac.com</h3>
        <hr class="my-4">
        <p>此网站是用来学习的,目前它以两种方式储存知识,Link用来保存其他网站的知识,通过一个链接指向网站地址.Libary用来保存自己的笔记,不过使用你得先学会.MD语言.本站的所有内容都是开源的.所有人都可以对所有内容进行编辑.啊 写了一半的权限管理然后放弃了.因为别的地方已经实现了，没必要在做一次.</p>
      </div>
    </div> 
  </div>
  </div>
  <div class="top text-center" style="height: 10rem;width:100%;">
    <span style="width:0;height:100%;display:inline-block"></span>
  </div>
  <div class="row" style="background:#fff">
<ul class="nav nav-tabs justify-content-center col-12" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="home" href="/" aria-controls="home" role="tab"aria-selected="false">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="libary-tab" data-toggle="tab" href="#a" role="tab" aria-controls="libary" aria-selected="true" onclick="hidehome()">Libary</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="link-tab" data-toggle="tab" href="#b" role="tab" aria-controls="link" aria-selected="false" onclick="hidehome()">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="show" href="#c" role="tab" aria-controls="show" onclick="showhome()" aria-selected="false">show</a>
  </li>


</ul>
<div class="tab-content col-12" style="padding:0;margin：0;" id="myTabContent">
  <div class="tab-pane fade show active embed-responsive-16by9" id="a" role="tabpanel" aria-labelledby="libary-tab">
    <iframe src='/blog/gethtml' class="embed-responsive-item" style="border: none;"></iframe>
  </div>
  <div class="tab-pane fade embed-responsive-16by9" id="b" role="tabpanel" aria-labelledby="link-tab">
      <iframe src='/link' class="embed-responsive-item" style="border: none;"></iframe>
  </div>
</div>  
  </div>
</div>
<div class="down" style="position: fixed;width:100%;top:0;z-index:-1;">
  <img src="{{asset('images/background.jpg')}}"  style="width:100%;height:100%;padding: 0;margin: 0">
</div>
    <script src="/js/jquery.js"></script>
<script>

if($(window).width()<767){
  $('img').attr('src',"{{asset('images/background2.jpg')}}");
}
if(($(window).height())<($('body-1').height()+$('.top').height()+$('#myTab').height())){
  $('.tab-content').css('display','none');
}
  function showhome(){
    $('.body-1').css('display','none');
    $('.top').css('display','block');
    $('.top').css('height',$(window).height());
    $('.tab-content').css('display','none');

  }
  function hidehome(){
    $('.tab-content').css('display','block');
    $('.body-1').css('display','none');
    $('.top').css('display','none');
  }
  $('.down').height($(window).height()*1.1);
  $('.down').children('div').css('position','relative');
  $('iframe').height($(window).height());
  $('iframe').width($('iframe').parent('div').width());
  if($(window).width()>728){
    boxwidth = "1rem";
  }else{
    boxwidth = '.3rem';
  }
  html = "<div style='width:"+boxwidth+";background:#fff;display:inline-block;margin:1px;position:relative;bottom:0;top:-4rem;'></div>";
  for(i=0;i<32;i++){ 
    $('.top').prepend(html);
  }
</script>
<script>
    (window)
    var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    var analyser = audioCtx.createAnalyser();
    analyser.fftSize = 32;
    var bufferLength = analyser.fftSize;
    var dataArray = new Uint8Array(bufferLength);
    analyser.getByteTimeDomainData(dataArray);


  

    // 获取音频 

    function getData() {
        source = audioCtx.createBufferSource();
        var request = new XMLHttpRequest();

        request.open('GET', '{{asset("music.mp3")}}', true);

        request.responseType = 'arraybuffer';


        request.onload = function () {
            var audioData = request.response;

            audioCtx.decodeAudioData(audioData, function (buffer) {
                source.buffer = buffer;

                source.connect(audioCtx.destination);
                source.loop = true;
            },

                function (e) { "Error with decoding audio data" + e.err });
        }

        request.send()
    } 
    getData();
    source.connect(analyser);


       // draw an oscilloscope of the current audio source
    function draw() {

        drawVisual = requestAnimationFrame(draw);
        analyser.getByteTimeDomainData(dataArray);
        for(i=0;i<bufferLength;i++){
          $('.top').children('div').eq(i).animate({height:((dataArray[i]/128.0)-.3)*3+'rem'},1000/60);
        }
    }
      draw();
      source.start(0);
      $('.top').click(function(){
        if(audioCtx.state === 'running') {
          audioCtx.suspend().then(function() {
            window.cancelAnimationFrame(drawVisual);
          });
        } else if(audioCtx.state === 'suspended') {
          audioCtx.resume().then(function() {
            draw();
          });
        }
      })
</script>
@endsection
