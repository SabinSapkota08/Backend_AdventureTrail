<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        
        $orders =   Order::paginate(10);
        return view("vendor.multiauth.dashboard.orders.index",compact("orders"));
    
}

function create(){

    request()->validate([
        "order_date"=>"required",
        "total_price"=>"required",
        "is_paid"=>"required",
        "paid_by"=>"required",
        "is_cancelled"=>"required",
        "products"=>"required",
    ]);

$order  = new  Order();
$order->order_date = request()->order_date;
$order->total_price = request()->total_price;
$order->is_paid = request()->is_paid;
$order->paid_by = request()->paid_by;
$order->is_cancelled = false;
$order->save();


foreach(request()->products as $product){
    // return $product["id"];
    $orderDetail  = new  OrderDetail();
    $orderDetail->order_id = $order->id; 
    $orderDetail->product_id = $product["id"]; 
    $orderDetail->product_quantity =$product["product_quantity"] ; 
    $orderDetail->product_amount = $product["product_amount"]; 

    $orderDetail->order_date = $order->order_date; 
    $orderDetail->save();

}

return response()->json("Success",200);





}
}



