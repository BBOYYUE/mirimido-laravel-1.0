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
    		<li class="nav-item"><a href="/Doc/" class="nav-link">Doc</a></li>
    		<li class="nav-item"><a href="/Blog/" class="nav-link">Blog</a></li>
    		<li class="nav-item"><a href="/Code/" class="nav-link">Code</a></li>
    		<li class="nav-item"><a href="/Sponsor/" class="nav-link">Sponsor</a></li>
	@endsection           
	@section('myLoginMenu')
    		<li class="nav-item"><a href="/link/" class="nav-link">Link</a></li>
    		<li class="nav-item"><a href="/Doc/" class="nav-link">Doc</a></li>
    		<li class="nav-item"><a href="/Blog/" class="nav-link">Blog</a></li>
    		<li class="nav-item"><a href="/Code/" class="nav-link">Code</a></li>
    		<li class="nav-item"><a href="/Sponsor/" class="nav-link">Sponsor</a></li>
	@endsection           
        
            @section('content')
            <div class="container">
                <div class="title m-b-md">
                    Cmfac.com
                </div>
            </div>
            @endsection
