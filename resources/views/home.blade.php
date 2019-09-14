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
<div class="top text-center" style="position: relative;margin:0 auto;height:5rem;">
<span style="width:0;height:110%;display:inline-block"></span>
</div>
</div>
    <script src="/js/jquery.js"></script>
<script>
  if($(window).width()>728){
    boxwidth = "1rem";
  }else{
    boxwidth = '.3rem';
  }
  html = "<div style='width:"+boxwidth+";background:#fff;display:inline-block;margin:1px;position:relative;bottom:0;'></div>";
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
