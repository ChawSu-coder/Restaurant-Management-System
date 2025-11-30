@extends('admin.maindesign')
@section('add_food')
<!-- Form Header -->
    <div class="container" style="max-width: 600px">
        <div class="bg-blue-600 px-6 py-4 text-center">
            <h2 class="text-xl font-semibold text-white">
                Add New Food Item
            </h2>
        </div>
        <!-- Form Content -->
        @if (session('success'))
            <div class="mb-4 bg-green border text-success px-4 rounded relative">
                {{session('success')}}
            </div>
        @endif
        <form action="{{route('admin.postaddfood')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="food_name" placeholder="Food title" required class="form-control mb-3 rounded">
            <textarea name="food_details" placeholder="Description" required style="min-height: 200px" class="form-control mb-3 rounded"></textarea>
            <input type="number" name="food_price" placeholder="Price" min="0" step="1" required class="form-control mb-3 rounded">
            <input type="file" name="food_image" accept="image/*" class="form-control mb-3 rounded">
            <button class="btn btn-success w-100 ">Add Food</button>
        </form>
    </div>
@endsection