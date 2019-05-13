@extends('layouts.layout', ['title' => "Cabinet"])

@section('content')
    <div class="container" style="margin-top: 200px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <style type="text/css">
                    .sl {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: Black;border-collapse: collapse;}
                    .sl th {font-size:12px;background-color:White;border-width: 1px;padding: 8px;border-style: solid;border-color: Black;text-align:left;}
                    .sl tr {background-color:White;}
                    .sl td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: Black;}
                </style>
                @if(Auth::user()->role == 'admin')
                    <a href=" {{route('adminProducts.index')}} " class="btn btn-outline-primary">Products</a>
                    <a href=" {{route('adminCategories.index')}} " class="btn btn-outline-primary">Categories</a>
                @endif
                <table class="sl" border="1">
                    <tr>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>email</th>
                    </tr>
                    <tr>
                        <td>{{ Auth::user()->name }}</td>
                        <td>{{ Auth::user()->last_name }}</td>
                        <td>{{ Auth::user()->address }}</td>
                        <td>{{ Auth::user()->phone }}</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                </table>
                <div class="card" style="margin: 10px">
                    @if(Auth::user()->role == 'user')
                    <div class="card-header">Orders</div>

                    <div class="card-body">

                            @if(count($listOfOrders) > 0)
                            <table class="sl" border="1">
                                <tr>
                                    <th>№</th>
                                    <th>Order</th>
                                    <th>Price</th>
                                    <th>Payment</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                </tr>

                                @foreach($listOfOrders as $listOfOrder)
                                <tr>

                                    <td>{{ $listOfOrder->id }}</td>

                                    <td><table>
                                            @foreach($listOfOrder->order as $order)
                                            <tr>
                                                <td><img src="{{asset($order->img)}}" style="width: 100px"></td>
                                                <td>{{ $order->product_name }}</td>
                                                <td>${{ $order->product_price }}</td>
                                                <td>x{{ $order->quantity }}</td>
                                            </tr>
                                            @endforeach
                                    </table></td>
                                    <td>{{ $listOfOrder->total_price }}</td>
                                    <td>{{ $listOfOrder->payment }}</td>
                                    <td>{{ $listOfOrder->address }}</td>
                                    <td>{{ $listOfOrder->status }}</td>
                                    <td>{{ $listOfOrder->time }}</td>
                                </tr>
                                @endforeach
                            </table>
                            @else
                                <h2>You have no active orders.</h2>
                            @endif

                    </div>
                    @else
                    <form action="{{ route('cabinet.moderate') }}" method="post">
                        @csrf
                        @method('POST')

                        <button>Save</button>
                        <div class="card-header">Orders</div>
                        @if(count($listOfOrders) > 0)
                        <table class="sl" border="1">
                            <tr>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Order №</th>
                                <th>Order</th>
                                <th>Price</th>
                                <th>Payment</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                            @foreach($listOfOrders as $listOfOrder)
                                <tr>
                                    <td>{{ $listOfOrder->name }}</td>
                                    <td>{{ $listOfOrder->last_name }}</td>
                                    <td>{{ $listOfOrder->address }}</td>
                                    <td>{{ $listOfOrder->phone }}</td>
                                    <td>{{ $listOfOrder->email }}</td>
                                    <td>{{ $listOfOrder->order_id }}</td>
                                    <td><table class="sl" border="1">
                                            @foreach($listOfOrder->order as $order)
                                                <tr>
                                                    <td><img src="{{asset($order->img)}}" style="width: 100px"></td>
                                                    <td>{{ $order->product_name }}</td>
                                                    <td>${{ $order->product_price }}</td>
                                                    <td>x{{ $order->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </table></td>
                                    <td>{{ $listOfOrder->total_price }}</td>
                                    <td>{{ $listOfOrder->payment }}</td>
                                    <td>{{ $listOfOrder->time }}</td>
                                    <td>
                                        <select name="{{ $listOfOrder->order_id }}" id="{{ $listOfOrder->order_id }}" >
                                            <option value="new">New</option>
                                            <option value="complete">Complete</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <h2>You have no active orders.</h2>
                        @endif

                    </form>



                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@include('parts.search')
