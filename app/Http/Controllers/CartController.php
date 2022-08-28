<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Location;

class CartController extends Controller
{
    //add
    public function add(Request $request){
        $product = Product::find($request->id);
        return response()->json(['product' => $product]);
    }
    public function add_customer(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->customer_number = $request->customer_number;
        $customer->save();
        return response()->json(['success' => 'New Customer Added Successfully!', 'name'=>$customer->name]);
    }

    //test
    public function test(Request $request){
        $validator  = Validator::make($request->all(),[
            'customer_name' => 'required',
            'customer_number' => 'required',
        ]);
        if(!$validator->fails()){
            //insert data in order table
            $order = new Order();
            $order->invoice_no =$request->order['invoice_no'];
            $order->product_quentity = $request->order['product_quentity'];
            $order->sub_total = $request->order['sub_total'];
            $order->discount = $request->order['discount'];
            $order->purchasing_total = $request->order['purchasing_total'];
            $order->grand_total = $request->order['grand_total'];
            $order->save();

            // insert data into customers

            $customer =new Customer();
            $customer->order_id = $order->id;
            $customer->invoice_no = $order->invoice_no;
            $customer->customer_name = $request->customer_name;
            $customer->customer_number = $request->customer_number;
            $customer->customer_address = $request->customer_address;
            $customer->save();


            // insert data into order_details

            foreach($request->order_details as $order_detail){
                $order_details = new Order_Detail();
                $order_details->order_id = $order->id;
                $order_details->invoice_no = $order->invoice_no;
                $order_details->product_name = $order_detail['name'];
                $order_details->product_purchasing_price = $order_detail['product_purchasing_price'];
                $order_details->product_selling_price = $order_detail['sell_price'];
                $order_details->product_quentity = $order_detail['quentity'];
                $order_details->product_purchasing_total = $order_detail['product_purchasing_total'];
                $order_details->product_selling_total = $order_detail['product_selling_total'];
                $order_deltais_save = $order_details->save();

                if($order_deltais_save){
                   Product::where('name', $order_details->product_name)->decrement('quentity', $order_details->product_quentity);
                   Product::where('name', $order_details->product_name)->increment('sell_quentity', $order_details->product_quentity);
                }
            }
            return response()->json(['success' => 'order_complete']);
        }
        else{
            return response()->json(['fails' => $validator->errors()]);
        }

//customer name
// public function customer_name(){
//     $customer = [];
//     $customers = Customer::select('name')->latest()->get();

//     foreach($customers as $customer){
//         $customer_name[] = $customer->name;
//     }
//     return response()->json(['names' => $customer_name]);
}
// // customer contact number
// public function customer_number(){
//         $customer = [];
//         $customers = Customer::select('customer_number')->latest()->get();
//         foreach ($customers as $customer) {
//             $customer_number [] = $customer->customer_number;
//         }
//         return response()->json(['names' => $customer_number]);
// }
}
