<div class="row" style="height:100%;margin:0;">
    <div class="col-3 text-center" style="padding:0;">
        <a class="nav-link show-secondview"><span class="iconfont icon-shangjiantou"></span></a>
    </div>
    <ul class="nav nav-tabs justify-content-center col-6 col-offset-1" style="padding:0;" id="myTab">
        <li class="nav-item menu">
            <a class="nav-link" href="/blog/gethtml">Libary</a>
        </li>
        <li class="nav-item menu">
            <a class="nav-link" href="/link">Link</a>
        </li>
    </ul>
    <div class="col-3 text-center" style="padding:0;">
        @if (Route::has('login'))
        @auth
        <a id="navbarDropdown" class="nav-link btn btn-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img class="iconfont rounded-circle" src="{{ asset('/images/me.jpg')}}"
                style="width:1.5rem;height:1.5rem;" />
        </a>
        <div class="dropdown-menu dropdown-menu-right menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/userdir/html">my Book</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        @else
        <a class="nav-link btn btn-link" href="{{ route('login') }}">
            <span class="iconfont icon-icon_zhanghao"></span>
        </a>
        @endauth
        @endif
    </div>
	<div id="page-tab" style="display: none">
		<nav id="page-tab-content">
			<div id="menu-list"></div>
		</nav>
		<div id="page-operation">
			<div id="menu-all">
				<ul id="menu-all-ul">
				</ul>
			</div>
		</div>
	</div>

</div>
<script>
</script>
