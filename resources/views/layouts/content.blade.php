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

	#header{background-color:#0073aa;}
        body{background: #343a40;}
    </style>
</head>
<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-#0073aa" id="header">
        @section('header-left')
        @show
        @section('header-right')
        @show
    </nav>
    @section('modal')
    @show
    <div class="container-fluid" id='box'>
        <div class="row" style="height: 100%">
        <div class="col-md-2 col-sm-12" style="padding: 0">
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
    $('#box').css('height',$(window).height()*.9)
</script>
@show
</html>
