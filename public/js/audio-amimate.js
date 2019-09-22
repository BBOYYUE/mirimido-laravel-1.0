(window)
var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
var analyser = audioCtx.createAnalyser();
analyser.fftSize = 32;
var bufferLength = analyser.fftSize;
var dataArray = new Uint8Array(bufferLength);
analyser.getByteTimeDomainData(dataArray);
 if ($(window).width() > 728) {
    boxwidth = "1rem";
    boxheight = $('.home-jumbotron').height();
    $('.music-list').width("80%");
  } else {
    boxwidth = '.3rem';
    boxheight = $('.home-jumbotron').height()*.5;
    $('.music-list').width("90%");
  }
  
  // 获取音频 
  
  function getData(url) {
  source = audioCtx.createBufferSource();
  var request = new XMLHttpRequest();

  request.open('GET', url, true);
  
  request.responseType = 'arraybuffer';
  request.onload = function(){
    $('.music-progress-bar').css('display','inline-block')
  }  
  request.onloadend = function () {
    
    $('.animate').height(boxheight);
    var audioData = request.response;
    //$('.animate').css('margin','2rem');
    audioCtx.decodeAudioData(audioData, function (buffer) {
      source.buffer = buffer;

      source.connect(audioCtx.destination);
      source.loop = true;
    },

      function (e) { "Error with decoding audio data" + e.err });
  }
  request.onprogress = function (event) {
    path = Math.floor(event.loaded/event.total*100);

    $('.music-progress-bar').css('width',path+'%')
    $('.music-progress-bar').attr('aria-valuenow',path)
    console.log(path+'%');
    console.log(event.loaded);
    console.log(event.total);
  };
  request.send()
}
url = 'http://cmfac/music.mp3';
makebox();
getData(url);
source.connect(analyser);

function makebox() {
   html = "<div style='width:" + boxwidth + ";background:#fff;display:inline-block;margin:1px;position:relative;bottom:0;top:-5rem;'></div>";
  for (i = 0; i < 32; i++) {
    $('.animate').prepend(html);
  }
}
function getMusic(url){
      source.stop();
      window.cancelAnimationFrame(drawVisual);
      //var audioCtx = new (window.AudioContext || window.webkitAudioContext)();
      getData(url);
      source.connect(analyser);
      source.start(0);
      draw();
}
// draw an oscilloscope of the current audio source
function draw() {

  drawVisual = requestAnimationFrame(draw);
  analyser.getByteTimeDomainData(dataArray);
  for (i = 0; i < bufferLength; i++) {
    $('.animate').children('div').eq(i).animate({ height: ((dataArray[i] / 128.0) - .3) * 4 + 'rem' }, 1000 / 60);
  }
}
draw();
source.start(0);
$('.animate').click(function () {
  if (audioCtx.state === 'running') {
    audioCtx.suspend().then(function () {
      window.cancelAnimationFrame(drawVisual);
    });
  } else if (audioCtx.state === 'suspended') {
    audioCtx.resume().then(function () {
      draw();
    });
  }
})
