<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Status') }}
        </h2>
    </x-slot>
    @section('my_order')
    <div class="container-fluid" >
    <table class="table table-dark table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th class="col-lg-2">Your Name</th>
            <th class="col-lg-3">Your Email</th>
            <th class="col-lg-1">Food Image</th>
            <th class="col-lg-2">Food Quantity</th>
            <th class="col-lg-2">Food Price</th>
            <th class="col-lg-2">Order Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($my_order as $order )
            <tr>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->customer_email}}</td>
                <td class="text-center" ><img style="width: 150px;" src="{{asset('food_img/'.$order->food_image)}}" alt="{{$order->food_image}}"></td>
                <td>{{$order->food_quantity}}</td>
                <td>${{$order->food_price}}</td>
                <td>{{$order->order_status}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    @endsection
</x-app-layout>
