@extends('admin.maindesign')
<base href="/public">
@section('update_food')
<!-- Form Header -->
    <div class="container" style="max-width: 600px">
        <div class="bg-blue-600 px-6 py-4 text-center">
            <h2 class="text-xl font-semibold text-white">
                Update Food Item
            </h2>
        </div>
        <!-- Form Content -->
        @if (session('update'))
            <div class="mb-4 bg-green border text-success px-4 rounded relative">
                {{session('update')}}
            </div>
        @endif
        <form action="{{route('admin.postupdatefood',$food->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="food_name" value="{{$food->food_name}}" required class="form-control mb-3 rounded">
            <textarea name="food_details" required style="min-height: 200px" class="form-control mb-3 rounded">{{$food->food_details}}</textarea>
            <input type="number" name="food_price" value="{{$food->food_price}}" min="0" step="1" required class="form-control mb-3 rounded">
            <div class="mb-2">
                <h4>Old Photo</h4>
                <img style="width: 100px;" src="{{asset('food_img/'.$food->food_image)}}" alt="">
            </div>
            <label for="updateimage">Update Photo From Here</label>
            <input type="file" name="food_image" accept="image/*" class="form-control mb-3 rounded">
            <button class="btn btn-success w-100 ">Update Food</button>
        </form>
    </div>
@endsection