<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();

        return view('admin.pages.return.index', compact('orders'));
    }
    //bill search
    public function search(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) {
            $orders = Order::where('invoice_no', 'like', '%' . $search . '%')->get();
            if ($orders->count() >= 1) {
                return view('admin.pages.return.search', compact('orders'));
            } else {
                $customers = Customer::where('customer_number', 'like', '%' . $search . '%')->get();
                if ($customers->count() >= 1) {
                    $orders = [];
                    foreach ($customers as $customer) {
                        $orders[] = $customer->order;
                    }
                    return view('admin.pages.return.search', compact('orders'));
                    return $orders;
                } else {

                    return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
                }
            }
        } else {
            $orders = Order::latest()->orderBy('created_at', 'ASC')->get();
            return view('admin.pages.return.search', compact('orders'));
        }
    }
    //order detials
    public function details($id){
        $order = Order::find($id);
        $order_details = $order->order_details;
        $customer = Customer::where('order_id', $id)->first();
        return view('admin.pages.return.order_details', compact('order_details', 'customer', 'order'));
    }

    //order_return
    public function return(Request $request){

        $order_detail = Order_Detail::find($request->id);

        if($order_detail->product_quentity == $request->return_quentity){
            $order = Order::find($order_detail->order_id);
            $order->product_quentity = $order->product_quentity - $order_detail->product_quentity;
            $order->sub_total = $order->sub_total - $order_detail->product_selling_total;
            $order->purchasing_total= $order->purchasing_total - $order_detail->product_purchasing_total;
            $order->grand_total = $order->sub_total - ($order->sub_total * $order->discount)/100;
            $order->save();

            Product::find($order_detail->product_id)->increment('quentity', $order_detail->product_quentity);
            Product::find($order_detail->product_id)->decrement('sell_quentity', $order_detail->product_quentity);

            Order_Detail::find($request->id)->delete();

            if($order->product_quentity == 0){
                Order::find($order_detail->order_id)->delete();
                return response()->json(['order_null' => "return successfull"]);
            }
            return response()->json(['success' => "return successfull"]);
        }


        $order_detail = Order_Detail::find($request->id);
        $order_detail->product_quentity = $order_detail->product_quentity - $request->return_quentity;
        $order_detail->product_selling_total = $order_detail->product_selling_price * $order_detail->product_quentity;
        $order_detail->product_purchasing_total = $order_detail->product_purchasing_price * $order_detail->product_quentity;
        $order_detail->save();

        $order = Order::find($order_detail->order_id);
        $order->product_quentity = $order->product_quentity - $request->return_quentity;

        $order->sub_total = $order->sub_total - ($order_detail->product_selling_price * $request->return_quentity);
        $order->purchasing_total = $order->purchasing_total - ($order_detail->product_purchasing_price * $request->return_quentity);
        $order->grand_total = $order->sub_total - ($order->sub_total * $order->discount) / 100;
        $order->save();

        Product::find($order_detail->product_id)->increment('quentity', $request->return_quentity);
        Product::find($order_detail->product_id)->decrement('sell_quentity', $request->return_quentity);

        return response()->json(['success' => "Return Successfull"]);





    }
}
