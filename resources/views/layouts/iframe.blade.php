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

    @section('head')
    @show
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    @section('alert')
        @component('component/alert/alert')
        @endcomponent
    @show
    @section('content')
    @show
    <div class="box" style="width: 100%;height:3rem;"></div>
</body>
    @section('script')
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

</html>
