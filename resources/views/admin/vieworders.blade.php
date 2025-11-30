@extends('admin.maindesign')
@section('show_orders')
<div class="container-fluid" style="font-size: 12px;">
<table class="table table-dark table-bordered table-striped mt-4">
     @if (session('danger'))
            <div class="mb-4 bg-green border text-danger text-center px-4 rounded relative">
                {{session('danger')}}
            </div>
        @endif
    <thead>
        <tr>
            <th class="col-lg-1">User Name</th>
            <th class="col-lg-1">User Email</th>
            <th class="col-lg-2">User Address</th>
            <th class="col-lg-1">User Phone</th>
            <th class="col-lg-2">Food Name</th>
            <th class="col-lg-1">Food Image</th>
            <th class="col-lg-1">Food Quantity</th>
            <th class="col-lg-1">Food Price</th>
            <th class="col-lg-1">Order-Status</th>
            <th class="col-lg-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order )
            <tr>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->customer_email}}</td>
                <td>{{$order->customer_address}}</td>
                <td>{{$order->customer_phone}}</td>
                <td>{{$order->food_name}}</td>
                <td class="text-center" ><img style="width: 100px;" src="{{asset('food_img/'.$order->food_image)}}" alt="{{$order->food_image}}"></td>
                <td>{{$order->food_quantity}}</td>
                <td>${{$order->food_price}}</td>                
                <td>{{$order->order_status}}</td>
                <td>
                    <a href="{{route('admin.delivered',$order->id)}}" class="btn btn-outline-success btn-sm">Delivered</i></a>
                    <a href="{{route('admin.cancel',$order->id)}}" class="btn btn-outline-danger btn-sm" >Cancel</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection