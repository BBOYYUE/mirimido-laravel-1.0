        <div class="navbar-nav">
            {{$slot}}
          @if (Route::has('login'))
            @auth
               <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link btn btn-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                                </div>
                            </li>
                       
            @else
            <a class="nav-link btn btn-link" href="{{ route('login') }}">login</a>
            <a class="nav-link btn btn-link" href="{{ route('register') }}">rigster</a>
            @endauth
          @endif
        </div>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>