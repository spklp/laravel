@extends('layouts.layout', ['title' => "All Products"])

@section('content')

    <div class="container" style="margin-top: 200px">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card" style="margin: 10px">
                    @if(Auth::user()->role == 'admin')
                        @if (session('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <a href="{{ route('adminProducts.create') }}" class="btn btn-outline-primary">Add Product</a>
                        <div class="card-header">Products</div>
                        <table class="sl" border="1">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Original Price</th>
                                <th>Price</th>
                                <th>Flag</th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img src="{{asset($product->img)}}" style="width: 100px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->original_price}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->flag}}</td>
                                    <td><a href="{{ route('adminProducts.edit', ['id' => $product->id]) }}}" class="btn btn-outline-success">Edit</a><br>
                                        <form action="{{ route('adminProduct.destroy', ['id' => $product->id]) }}" method="post"
                                              onsubmit="if (confirm('Exactly remove?')){ return true } else { return false } ">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-outline-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $products->links() }}
                    @endif
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Cabinet</a>
                </div>
            </div>
        </div>
    </div>


@endsection

@include('parts.search')
