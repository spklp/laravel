@extends('layouts.layout', ['title' => "404"])

@section('content')


    <div class="product_details" style="margin-top: 300px">
        <div class="container">
            <h2>404 | Not Found</h2>
            <a href="/" class="btn btn-outline-primary">Home</a>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('js/product.js')}}"></script>
@endsection