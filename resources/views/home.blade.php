@extends('layouts.app')
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
                  </style>
	 
	@section('myUnLoginMenu')
    		<li class="nav-item"><a href="/link/" class="nav-link">Link</a></li>
    		<li class="nav-item"><a href="/Document/" class="nav-link disabled">Doc</a></li>
    		<li class="nav-item"><a href="/Blog/" class="nav-link disabled">Blog</a></li>
    		<li class="nav-item"><a href="/Code/" class="nav-link disabled">Code</a></li>
    		<li class="nav-item"><a href="/Sponsor/" class="nav-link disabled ">Sponsor</a></li>
	@endsection           
	@section('myLoginMenu')
    		<li class="nav-item"><a href="/link/" class="nav-link">Link</a></li>
    		<li class="nav-item"><a href="/Document/" class="nav-link disabled">Doc</a></li>
    		<li class="nav-item"><a href="/Blog/" class="nav-link disabled">Blog</a></li>
    		<li class="nav-item"><a href="/Code/" class="nav-link disabled">Code</a></li>
    		<li class="nav-item"><a href="/Sponsor/" class="nav-link disabled ">Sponsor</a></li>
	@endsection           
        
            @section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-3">Welcome</h1>
    <p class="lead">To Cmfac.com</p>
    <hr class="my-4">
    <p>This website is about learning. It mainly covers computers and networks. It also has some mathematics and algorithms. This site is not authoritative, so the content may be incorrect. But it's open source, and everyone can edit and modify it.</p>
  </div>
</div> 
<div class="notReady  jumbotron-fluid ">
 <div class="container notReady">
    <h3 class="display-5">NEXT - not ready</h3>
    <hr class="my-5">
  </div>
</div> 
            @endsection
