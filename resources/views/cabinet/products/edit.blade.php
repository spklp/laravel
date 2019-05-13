@extends('layouts.layout', ['title' => "Edit Product"])

@section('content')

    <div class="container" style="margin-top: 200px">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card" style="margin: 10px">

                    @if(Auth::user()->role == 'admin')
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        <form method="post" action="{{ route('adminProducts.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="submit" value="Save">
                            <div class="card-header">Product</div>
                            <table class="sl" border="1">
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Original Price</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Flag</th>
                                </tr>
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <img src="{{asset($product->img)}}" style="width: 100px"><br>
                                            <input name="image[main]" type="file">
                                        </td>
                                        <td><input type="text" name="name" value="{{  old('name') ?? $product->name }}"></td>
                                        <td>
                                            <select name="category" id="category" >
                                                value="{{ old('original_price') ?? '' }}
                                                <option value="{{ old('category') ?? $product->category_id }}">
                                                    {{ $categories[old('category')-1]->category_name ?? $product->category_name }}
                                                </option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="original_price"  value="{{ old('original_price') ?? $product->original_price }}"></td>
                                        <td><input type="text" name="price" value="{{ old('price') ?? $product->price }}"></td>
                                        <td><textarea name="descr" rows="5" cols="40">{{ old('descr') ?? $product->descr }}</textarea></td>
                                        <td>
                                            <select name="flag" id="flag" >
                                                <option value="{{ old('flag') ?? $product->flag }}">{{ old('flag') ?? $product->flag }}</option>
                                                <option value="new">new</option>
                                                <option value="hot">hot</option>
                                                <option value="sale">sale</option>
                                            </select>
                                        </td>
                                    </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>1 image</th>
                                    <th>2 image</th>
                                    <th>3 image</th>
                                </tr>
                                <tr>
                                    @foreach($productImages as $productImage)
                                    <td>
                                        <img src="{{asset($productImage->image)}}" style="width: 100px"><br>
                                        <input name="image[{{$productImage->id}}]" type="file">
                                    </td>
                                    @endforeach
                                </tr>
                            </table>
                        </form>

                        <a href="{{route('adminProducts.index')}}" class="btn btn-outline-primary">Back</a>
                    @endif
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Cabinet</a>
                </div>
            </div>
        </div>
    </div>


@endsection

@include('parts.search')
