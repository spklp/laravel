@extends('layouts.layout', ['title' => 'Subscribe'])

@section('content')
{{--@if (session('success'))--}}
{{--<div class="alert alert-success alert-dismissible fade show" role="alert">--}}
    {{--{{session('success')}}--}}
    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
        {{--<span aria-hidden="true">&times;</span>--}}
    {{--</button>--}}
{{--</div>--}}
{{--@endif--}}
<h1 style="margin-top: 200px">{{$msg}}</h1><br>
<a href="/">На главную</a>






@endsection

@include('parts.search')