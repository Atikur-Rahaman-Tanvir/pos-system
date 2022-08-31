<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
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
}
