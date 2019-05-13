@extends('layouts.layout', ['title' => "Edit Category"])

@section('content')

    <div class="container" style="margin-top: 200px">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card" style="margin: 10px">

                    @if(Auth::user()->role == 'admin')
                        <form method="post" action="{{ route('adminCategories.update', ['id' => $category->category_id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="submit" value="Save">
                            <div class="card-header">Category</div>
                            <table class="sl" border="1">
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                </tr>
                                    <tr>
                                        <td>{{ $category->category_id }}</td>
                                        <td><input type="text" name="name" value="{{ old('name') ?? $category->category_name }}"></td>
                                        <td><textarea name="descr" rows="5" cols="40">{{ old('descr') ?? $category->category_descr }}</textarea></td>
                                    </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        <img src="{{asset($category->category_img)}}" style="width: 800px"><br>
                                        <input name="image" type="file">
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <a href="{{route('adminCategories.index')}}" class="btn btn-outline-primary">Back</a>
                    @endif
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Cabinet</a>
                </div>
            </div>
        </div>
    </div>


@endsection

@include('parts.search')