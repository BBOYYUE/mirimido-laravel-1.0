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

	#header{background-color:#2e3761;}
        body{background:#2e3761;}
        iframe{background: #f8fafc;}
    .icon {
        width: 1.5em;
        height: 1.5em;
        vertical-align: -0.15em;
        fill: currentColor;
        overflow: hidden;
    }
    span{
        color: #2e3761;
    }
    a{
        color:#2e3761;
    }
    </style>
</head>
<body>

    
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-#0073aa" id="header">
        @section('header-left')
        @show
        @section('header-right')
        @show
    </nav>-->
    @section('modal')
    @show
    <div class="container-fluid" id='box'>
        <div class="row msidebar">
            <div class="col-12" style="padding:0">
            @section('msidebar')
            @show
            </div>
        </div>
        <div class="row" style="height: 100%">
        <div class="col-md-2 col-sm-12 sidebar" style="padding: 0">
            @section('sidebar')
            @show
        </div>
        <div class="embed-responsive col-md-10 col-sm-12  embed-responsive-16by9">
            @empty($data->data['file'])
            <iframe class="embed-responsive-item"  id="iframe" name="iframe" style="padding:0;width:100%" src="/showHtml/gethtml"></iframe>
            @endempty
            @empty($data->data['html'])
            <iframe class="embed-responsive-item" id="iframe" name="iframe"  src="/showMd/gethtml"></iframe>
            @endempty
        </div>
        </div>
    </div>
</body>
@section('script')
    <script src="/js/jquery.js"></script>
<script>
  $('.showmenu').click(function(){
    $('.menu').toggle();
  })
    if($(window).width()>767){
        $('.msidebar').css('display','none');
        $('#box').css('height',$(window).height()*.95);
    }else{
        $('.sidebar').css('display','none');
        $('#box').css('height',$(window).height());
    }

    
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
                $('.alert-success').text(data.data);
                if($('.alert-info').fadeOut()){
                    $('.alert-success').fadeIn(3000);
                    $('.alert-success').fadeOut(1000);
                    if(reload){setTimeout(function(){location.reload()},5000)};
                }
            }else if(data.code==4){
                $('.alert-info').fadeOut(1000);
                $('.alert-danger').text(data.data);
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
</html>
