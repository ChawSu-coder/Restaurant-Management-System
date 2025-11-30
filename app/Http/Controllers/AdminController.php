<?php

namespace App\Http\Controllers;

use App\Models\BookTable;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Orders;

class AdminController extends Controller
{
    public function addFood()
    {
        return view('admin.addfood');
    }
    public function postAddFood(Request $request)
    {
        $food = new Food();
        $food->food_name = $request->food_name;
        $food->food_details = $request->food_details;

        if ($request->hasFile('food_image')) {
            $image = $request->file('food_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_img'), $imagename); // moves to /public/food_img
            $food->food_image = $imagename;
        }
        $food->food_price = $request->food_price;
        $food->save();

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function showFood()
    {
        $foods = Food::all();
        return view('admin.showfood', compact('foods'));
    }

    public function deleteFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back()->with('danger', 'Deleted Successfully!!');
    }

    public function updateFood($id)
    {
        $food = Food::findOrFail($id);
        return view('admin.updatefood', compact('food'));
    }

    public function postUpdateFood(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->food_name = $request->food_name;
        $food->food_details = $request->food_details;

        if ($request->hasFile('food_image')) {
            $image = $request->file('food_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('food_img'), $imagename); // moves to /public/food_img
            $food->food_image = $imagename;
        }
        $food->food_price = $request->food_price;
        $food->save();

        return redirect()->back()->with('update', 'Updated Successfully!');
    }

    public function viewOrders()
    {
        $orders = Orders::all();
        return view('admin.vieworders', compact('orders'));
    }

    public function statusDelivered($id)
    {
        $order = Orders::findOrFail($id);
        $order->order_status = "Delivered";
        $order->save();
        return redirect()->back();
    }

    public function statusCancel($id)
    {
        $order = Orders::findOrFail($id);
        $order->order_status = "Cancel";
        $order->save();
        return redirect()->back();
    }

    public function viewBookedTable()
    {
        $booked_tables = BookTable::all();
        return view('admin.showbookedtable', compact('booked_tables'));
    }
}
