@extends('layouts.layout', ['title' => "Create Category"])

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
                        <form method="post" action="{{ route('adminCategories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" class="btn btn-outline-success" value="Add">
                            <div class="card-header">Add Product</div>
                            <table class="sl" border="1">
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="name" value="{{ old('name') ?? '' }}"></td>
                                    <td><textarea name="descr" rows="5" cols="40">{{ old('descr') ?? '' }}</textarea></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td><input name="image" type="file"></td>
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