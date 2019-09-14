<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>生日贺卡</title>
</head>

<body style="background: #0073aa;">
    <div class="container-fluid ">
        <div class="row" style="padding:0">
            <div class="jumbotron jumbotron-fluid col-12" style="margin:0;">
                <div class="container text-center" style="position: relative">
                    <h1 class="display-3">生日快乐</h1>
                    <hr class="my-4">
                    <p>好久不见,十分想念,祝你生日快乐!</p>
                </div>
            </div>
        </div>
    </div>
        <div class="music" style="background: #0073aa;"> 
            <div class="top text-center" style="position: relative;margin:0 auto;height:5rem;">
                <span style="width:0;height:110%;display:inline-block"></span>
            </div>
        </div>
        <div style="width: 100%;padding:0;margin: 0;" class="box"></div>
        <div class="birthday-card" style="width: 100%; padding:0;position: fixed;z-index: -1;top:0;margin: 0;">
            <img src="{{asset('images/birthday.jpg')}}" alt="生日贺卡图片" style="width:100%;padding: 0;margin: 0">
        </div>

</body>
<script src="js/jquery.js"></script>
<script>
    // 生成元素块
    if ($(window).width() > 728) {
        boxwidth = "1rem";
    } else {
        boxwidth = '.3rem';
    }
    html = "<div style='width:" + boxwidth + ";background:#fff;display:inline-block;margin:1px;position:relative;bottom:0;'></div>";
    for (i = 0; i < 32; i++) {
        $('.top').prepend(html);
    }
    $('.container').css('top',$('.container-fluid').height()*.5)
    $('.jumbotron').height($(window).height()*.6)
    $('.birthday-card').css('height',$('.birthday-card').children('img').height());
    $('.music').css('height',($(window).height()-$('.container-fluid').height())*.95);
    $('.top').css('top',($('.music').height()-($('.top').height()*1.5))*.5);
    $('.box').css('height',$('.birthday-card').height());

</script>
<script>
    // 音频动效
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

        request.open('GET', "{{asset('music/music.mp3')}}", true);

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
          $('.top').children('div').eq(i).animate({height:(dataArray[i]/128.0)*2+'rem'},1000/60);
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
</html>