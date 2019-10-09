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
</ul>
<style>
  .list-group-item{
    background:rgba(203,200,246,0);
    color: #fff;
  }
  iframe{
    height: 100%;
  }
  </style>
