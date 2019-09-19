<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->

    <title>{{ config('app.name', 'Cmfac.com') }}</title>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('font/iconfont.js') }}" defer></script>

    @section('head')
    @show
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/iconfont.css') }}">
    <style>
    #header{
        position: fixed;
        width: 100%;
        bottom: 0;
        z-index: 999;
    }
    #card{
        padding:5px 5px 0 5px ;
    }
    span{
        color:#3490dc;
    }
	.card-text{
		overflow:hidden;
		text-overflow:ellipsis;
		display:-webkit-box;
		-webkit-line-clamp:4;
		-webkit-box-orient:vertical;
	}
        #header{background-color:#0073aa;}
        body{background: #343a40;}
    .icon {
        width: 1.5em;
        height: 1.5em;
        vertical-align: -0.15em;
        fill: currentColor;
        overflow: hidden;
    }
    .card-footer{
        z-index:2;
    }
 
    </style>
</head>
<body>
<!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-#0073aa" id="header">
    
        @section('header-left')
        @show
        @section('header-right')
        @show
    </nav>
-->
    @section('alert')
        @component('component/alert/alert')
        @endcomponent
    @show
    @section('modal')
    @show
    @section('content')
    @show
    </div>
    @section('script')
    <script src="/js/jquery.js"></script>
    <script>
if($(window).width()>767){
$('.card').mouseenter(function(){
    $(this).css('z-index','+=1');
    $(this).children('.card-footer').css('z-index','+=2');
    $(this).animate({margin:"-=.5rem"});
})
$('.card').mouseleave(function(){
    $(this).children('.card-footer').css('z-index','');
    $(this).css('z-index','');
    $(this).animate({margin:""});
})
}
    </script>
    @show
@section('requestScript')
<script>
    function getPost(formData,url,callback,reload=true){
        var request = new XMLHttpRequest();
        request.open('post',url);
        request.send(formData);
        
        request.onload = e => {
            $('.alert-info').text('正在保存');
            $('.alert-info').fadeIn(1000);
        };
        request.onloadend = e => {
            data = JSON.parse(request.responseText);
            console.log(data);
            console.log(data.code);
            if(data.code==1){
                $('.alert-success').text(data.data.message);
                if($('.alert-info').fadeOut()){
                    $('.alert-success').fadeIn(3000);
                    $('.alert-success').fadeOut(1000);
                    if(reload){setTimeout(function(){location.reload()},5000)};
                }
            }else if(data.code==4){
                $('.alert-info').fadeOut(1000);
                $('.alert-danger').text(data.data.message);
                $('.alert-danger').fadeIn(3000);
            }else{
                $('.alert-info').fadeOut(1000);
                $('.alert-danger').text(data.data.message);
                $('.alert-danger').fadeIn(3000);
            } 
        };
        request.ontimeout = e =>{
            $('.alert-info').fadeOut(1000);
            $('.alert-secondary').text('请求超时');
            $('.alert-secondary').fadeIn(3000);
        };
        request.onerror = e =>{
            $('.alert-info').fadeOut(1000);
            $('.alert-waring').text('请求失败');
            $('.alert-waring').fadeIn(3000);
        };
    }
    </script>
@show
</body>
</html>
