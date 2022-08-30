<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // bill
    public function bill(){
        $orders = Order::latest()->orderBy('created_at', 'ASC')->get();
        return view('admin.pages.bill.index',compact('orders'));
    }
    //bill search
    public function bill_search(Request $request){
        $search = $request->search;
        if (!is_null($search)) {
            $orders = Order::where('invoice_no', 'like', '%' . $search . '%')->get();
            if ($orders->count() >= 1) {
                return view('admin.pages.bill.search', compact('orders'));
            } else {
                $customers = Customer::where('customer_number','like', '%' . $search . '%')->get();
                if ($customers->count() >= 1) {
                    $orders = [];
                    foreach ($customers as $customer) {
                        $orders[] = $customer->order;
                    }
                    return view('admin.pages.bill.number_search', compact('orders'));
                    return $orders;
                }else{

                    return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
                }

            }
        } else {
            $orders = Order::latest()->orderBy('created_at', 'ASC')->get();
            return view('admin.pages.bill.search', compact('orders'));
        }

    }

    //bill invoice
    public function bill_invoice(Request $request){
        $order = Order::find($request->id);
        $order_details = $order->order_details;
        $customer = $order->customer;
        return response()->json(['order_details' => $order_details, 'order' => $order, 'customer' => $customer]);
    }
    //delete
    public function bill_delete(Request $request){
        Order::find($request->id)->delete();
        return response()->json(['success'=> 'Order Deleted SucccessFully!']);
    }
    // report
    public function report()
    {
        $orders = Order::select(
            DB::raw("date(created_at) as day"),
            DB::raw('sum(product_quentity) as product_quentity'),
            DB::raw('sum(purchasing_total) as purchasing_total'),
            DB::raw('sum(grand_total ) as grand_total '),
        )->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
        $show_date =  Carbon::now()->format('m-Y');
        return view('admin.pages.report.index', compact('orders', 'show_date'));
    }

    //serch by month
    public function monthly_report(Request $request){
        if(!is_null($request->data)){
            $date = explode('-', $request->data);
            $year = $date[0];
            $month = $date[1];


            $orders = Order::select(
                DB::raw("date(created_at) as day"),
                DB::raw('sum(product_quentity) as product_quentity'),
                DB::raw('sum(purchasing_total) as purchasing_total'),
                DB::raw('sum(grand_total ) as grand_total '),
            )->whereMonth('created_at', $month)->whereYear('created_at', $year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
            // return $orders;
            if($orders->count() >= 1){
                $show_date = $month.'-'.$year;
                $search_month = $month;
                return view('admin.pages.report.search', compact('orders', 'show_date', 'search_month'));
            }
            else{
                return response()->json(['not_found' => 'Not Found!']);
            }
        }
    }
    //serch by year
    public function yearly_report(Request $request){
        if(!is_null($request->data)){
            $date = explode('-', $request->data);
            $year = $date[0];

            $orders = Order::select(
                DB::raw("month(created_at) as day"),
                DB::raw('sum(product_quentity) as product_quentity'),
                DB::raw('sum(purchasing_total) as purchasing_total'),
                DB::raw('sum(grand_total ) as grand_total '),
            )->whereYear('created_at', $year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
            // return $orders;
            if($orders->count() >= 1){
                $show_date =$year;
                return view('admin.pages.report.yearly_search', compact('orders', 'show_date'));
            }
            else{
                return response()->json(['not_found' => 'Not Found!']);
            }
        }
    }
}
