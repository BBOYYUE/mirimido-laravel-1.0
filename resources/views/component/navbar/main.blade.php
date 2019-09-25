  <div class="row">
  <div class="col-1 text-center">
    <a class="nav-link show-secondview" ><span class="iconfont icon-shangjiantou"></span></a>
  </div>
  <ul class="nav nav-tabs justify-content-center col-10 col-offset-1" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="libary-tab" data-toggle="tab" href="#a" role="tab" aria-controls="libary"
        aria-selected="true">Libary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="link-tab" data-toggle="tab" href="#b" role="tab" aria-controls="link"
        aria-selected="false">Link</a>
    </li>
  </ul>
  <div class="col-1 text-center">
    @if (Route::has('login'))
    @auth
     <a id="navbarDropdown" class="nav-link btn btn-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      <img class="iconfont rounded-circle" src="{{ asset('/images/me.jpg')}}"  style="width:1.5rem;height:1.5rem;"/>
    </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @else
        <a class="nav-link btn btn-link" href="{{ route('login') }}"><span class="iconfont icon-icon_zhanghao"></span></a>
        @endauth
    @endif
  </div>
  </div>
  <div class="tab-content col-12" style="padding:0;margin：0;" id="myTabContent">
    <div class="tab-pane fade show active embed-responsive-16by9" id="a" role="tabpanel"
      aria-labelledby="libary-tab">
      <iframe src='/blog/gethtml' class="embed-responsive-item" style="border: none;"></iframe>
    </div>
    <div class="tab-pane fade embed-responsive-16by9" id="b" role="tabpanel" aria-labelledby="link-tab">
      <iframe src='/link' class="embed-responsive-item" style="border: none;"></iframe>
    </div>
 </div>
 