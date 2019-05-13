@extends('layouts.layout', ['title' => "All Categories"])

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
                        <a href="{{ route('adminCategories.create') }}" class="btn btn-outline-primary">Add Category</a>
                        <div class="card-header">Products</div>
                        <table class="sl" border="1">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Description</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->category_id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_descr}}</td>
                                    <td>
                                        @if($category->category_name != 'All')
                                        <a href="{{ route('adminCategories.edit', ['id' => $category->category_id]) }}" class="btn btn-outline-success">Edit</a><br>
                                            <form action="{{ route('adminCategories.destroy', ['id' => $category->category_id]) }}" method="post"
                                                  onsubmit="if (confirm('Exactly remove?')){ return true } else { return false } ">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-outline-danger" value="Delete">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Back to Cabinet</a>
                </div>
            </div>
        </div>
    </div>


@endsection

@include('parts.search')