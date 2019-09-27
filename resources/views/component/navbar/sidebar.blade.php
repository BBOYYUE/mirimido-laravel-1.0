<div class="card" style="height:100%;">
<div class="card-header">
  {{$data->data['dirname']}}
    <div class="float-right">
      @if($method!='show')
      <a style="display:inline" data-toggle="modal" data-target="#createModal"><span class="iconfont icon-icon_tianjia"></span></a>
      <a style="display:inline" href="/userhtml/gethtml?dir={{ $data->data['dir'] }}&dirid={{ $data->data['dirid']}}" target="_self"><span class="iconfont icon-shiyongwendang"></span></a>
      @else
      <a style="display:inline" href="/userfile/gethtml?dir={{ $data->data['dir'] }}&dirid={{$data->data['dirid']}}"  target="_self"><span class="iconfont icon-ceshishenqing"></span></a>
      @endif
      <a style="display:inline" href="/blog/gethtml" target="_self"><span class="iconfont icon-chehuisekuai"></span></a>
    </div>
</div>
<div class="card-body">
<div class="list-group flex-column">    
  {{ $slot }}
</div>
</div>
</div>