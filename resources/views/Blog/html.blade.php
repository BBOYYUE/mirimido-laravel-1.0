@extends('layouts/iframe')
@section('head')
@endsection
@section('content')
    <div class="container-fluid" style="padding: 20px;background:#f8fafc" >
        {!! $data->data['doc'] !!}
    </div>
@endsection
@section('script')
@parent
@endsection