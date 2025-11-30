@extends('main')
@section('search_food') 
    <div class="row">
        @foreach ($foods as $food )
            <div class="col-md-4">
                        <div class="card bg-transparent border my-3 my-md-0">
                            <img src="{{asset('food_img/'.$food->food_image)}}" alt="{{$food->food_image}}" class="rounded-0 card-img-top mg-responsive">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{$food->food_price}}</a></h1>
                                <h4 class="pt20 pb20">{{$food->food_name}} </h4>
                                <p class="text-white">{{$food->food_details}}</p>
                            </div>
                            <form action="{{route('addtocart')}}" method="post">
                                @csrf
                                <input type="hidden" name="food_id" value="{{$food->id}}">
                                <label for="quantity" class="text-white">Quantity :</label>
                                <input type="number" class="form-control bg-secondary text-white" name="quantity" value="1" min="1">
                                <button type="submit" class="btn btn-success btn-block mt-2"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button>
                            </form>
                        </div>
                    </div>
        @endforeach
    </div>
@endsection