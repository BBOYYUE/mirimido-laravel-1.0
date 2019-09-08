@extends('layouts.app')
@section('header-left')
    @component('component/navbar/header-left')
    @endcomponent
@endsection
@section('content')
<div class="container-fluid ">
  <div class="row" style="padding:0">
    <div class="jumbotron jumbotron-fluid col-12">
      <div class="container text-center" > 
        <h1 class="display-3">Welcome</h1>
        <p class="lead">To Cmfac.com</p>
        <hr class="my-4">
        <p>This website is about learning. It mainly covers computers and networks. It also has some mathematics and algorithms. This site is not authoritative, so the content may be incorrect. But it's open source, and everyone can edit and modify it.</p>
      </div>
    </div> 
</div>
</div>
@endsection
