<?php

namespace App\Http\Controllers;

use App\Mail\PersonalizedMail;
use App\Models\BookTable;
use App\Models\Food;
use App\Models\FoodCart;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('home', compact('foods'));
    }

    public function home()
    {
        if (Auth::id() && Auth::user()->usertype == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::id() && Auth::user()->usertype == 'user') {
            return view('dashboard');
        }
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $food = Food::findOrFail($request->food_id);

            $cart = new FoodCart();
            $cart->userID = Auth::id();
            $cart->food_id = $food->id;
            $cart->food_name = $food->food_name;
            $cart->food_details = $food->food_details;
            $cart->food_image = $food->food_image;
            $cart->food_quantity = $request->quantity;
            $cart->food_price = $cart->food_quantity * $food->food_price;
            $cart->save();
            return redirect()->back()->with('cart_message', 'food added to the cart');
        }
    }

    public function foodCart()
    {
        $current_auth = Auth::id();
        $cart_food_info = FoodCart::where('userID', '=', $current_auth)->get();
        return view('show_cart', compact('cart_food_info'));
    }

    public function removeCart($id)
    {
        $remove_food = FoodCart::findOrFail($id);
        $remove_food->delete();
        return redirect()->back()->with('message', 'Removed food from the cart');
    }

    public function confirmOrderCart(Request $request)
    {
        $current_user = Auth::id();
        $cart_foods = FoodCart::where('userID', '=', $current_user)->get();
        foreach ($cart_foods as $cart_food) {
            $single_order = new Orders();
            $single_order->customer_id = Auth::user()->id;
            $single_order->customer_name = Auth::user()->name;
            $single_order->customer_email = Auth::user()->email;
            $single_order->customer_address = Auth::user()->address;
            $single_order->customer_phone = Auth::user()->phone;
            $single_order->food_name = $cart_food->food_name;
            $single_order->food_image = $cart_food->food_image;
            $single_order->food_quantity = $cart_food->food_quantity;
            $single_order->food_price = $cart_food->food_price;
            $single_order->save();
        }

        return redirect()->back()->with('confirm_order', 'Confirm Your Order!!');
    }

    public function findTable(Request $request)
    {
        $book = new BookTable();
        $book->email = $request->email;
        $book->guest_numbers = $request->guest_numbers;
        $book->time = $request->time;
        $book->date = $request->date;
        $book->save();
        return redirect()->back()->with('booktable', 'Book table request sent');
    }

    public function orderStatus()
    {
        $current_auth = Auth::id();
        $my_order = Orders::where('customer_id', '=', $current_auth)->get();
        return view('order_status', compact('my_order'));
    }

    public function searchFood(Request $request)
    {
        $foods = Food::latest();
        if ($request->search) {
            $foods = $foods->where('food_name', 'LIKE', '%' . $request->search . '%')->get();
        }
        return view('search_food', compact('foods'));
    }
}
