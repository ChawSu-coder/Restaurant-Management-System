@extends('admin.maindesign')
@section('show_food')
<div class="container-fluid">
<table class="table table-dark table-bordered table-striped mt-4">
     @if (session('danger'))
            <div class="mb-4 bg-green border text-danger text-center px-4 rounded relative">
                {{session('danger')}}
            </div>
        @endif
    <thead>
        <tr>
            <th class="col-lg-2">Food Name</th>
            <th class="col-lg-4">Food Description</th>
            <th class="col-lg-2">Food Image</th>
            <th class="col-lg-2">Food Price</th>
            <th class="col-lg-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($foods as $food )
            <tr>
                <td>{{$food->food_name}}</td>
                <td>{{$food->food_details}}</td>
                <td class="text-center" ><img style="width: 150px;" src="{{asset('food_img/'.$food->food_image)}}" alt=""></td>
                <td>{{$food->food_price}}</td>
                <td>
                    <a href="{{route('admin.updatefood',$food->id)}}" class="btn btn-outline-success">Update</i></a>
                    <a href="{{route('admin.deletefood',$food->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection