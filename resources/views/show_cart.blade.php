@extends('main')
@section('show_cart')
<table class="table table-dark table-bordered table-striped mt-4">
     @if (session('message'))
            <div class="mb-4 bg-green border text-danger text-center px-4 rounded relative">
                {{session('message')}}
            </div>
        @endif
        @if (session('confirm_order'))
            <div class="mb-4 bg-green border text-success text-center px-4 rounded relative">
                {{session('confirm_order')}}
            </div>
        @endif
    <thead>
        <tr>
            <th class="col-lg-2">Food Name</th>
            <th class="col-lg-4">Food Details</th>
            <th class="col-lg-1">Food Image</th>
            <th class="col-lg-2">Food Quantity</th>
            <th class="col-lg-2">Food Price</th>
            <th class="col-lg-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total_price = 0;
        @endphp
        @foreach ($cart_food_info as $user_cart_food )
            <tr>
                <td>{{$user_cart_food->food_name}}</td>
                <td>{{$user_cart_food->food_details}}</td>
                <td class="text-center" ><img style="width: 150px;" src="{{asset('food_img/'.$user_cart_food->food_image)}}" alt="{{$user_cart_food->food_image}}"></td>
                <td>{{$user_cart_food->food_quantity}}</td>
                <td>${{$user_cart_food->food_price}}</td>
                <td>
                    <a href="{{route('delete.cart',$user_cart_food->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Remove</i></a>
                </td>
            </tr>
            @php
                $total_price = $total_price + $user_cart_food->food_price;
            @endphp
        @endforeach
    </tbody>
</table>
<h3>Total Price is : ${{$total_price}}</h3>

<div>
    <form action="{{route('cart.confirm')}}" method="post">
        @csrf
        <button class="btn btn-outline-success">Confirm Order</button>
    </form>
</div>
@endsection