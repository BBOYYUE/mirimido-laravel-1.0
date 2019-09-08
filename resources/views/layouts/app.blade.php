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
	.card-text{
		overflow:hidden;
		text-overflow:ellipsis;
		display:-webkit-box;
		-webkit-line-clamp:4;
		-webkit-box-orient:vertical;
	}
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
    @section('content')
    @show
    @section('script')
    @show
</body>
</html>
