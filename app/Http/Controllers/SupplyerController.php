<?php

namespace App\Http\Controllers;

use App\Models\supplyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class supplyerController extends Controller
{
    public function index()
    {
        // $supplyers = supplyer::orderby('status', "DESC")->get();
        $supplyers = supplyer::latest()->get();
        return view('admin.pages.supplyer.index', compact('supplyers'));
    }
    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company_name' => 'required',
            'total' => 'required',
        ]);

        if (!$validator->fails()) {
            $supplyer = new supplyer();
            $supplyer->name = $request->name;
            $supplyer->number = $request->contact_number;
            $supplyer->company_name = $request->company_name;
            $supplyer->invoice_no = $request->invoice_no;
            $supplyer->total = $request->total;
            $supplyer->payment = $request->payment;
            if($request->payment == $request->total){
                $supplyer->due = '0';
            }
            elseif(is_null($request->payment)){
                $supplyer->due = $request->total ;
            }else{
                $supplyer->due = $request->total-$request->payment;
            }
            if($request->payment == $request->total){
                $supplyer->status = 'paid' ;
            }
            elseif( is_null($request->payment)){
                $supplyer->status = 'unpaid';
            }
            elseif($request->payment < $request->total){
                $supplyer->status = 'partial paid';
            }
            if($request->payment > $request->total){
                return response()->json(['warning' => 'Payment is grater than total amount!',]);
            }else{
                $supplyer->save();
                return response()->json(['success' => 'New supplyer Added Successfully!',]);
            }
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //show
    public function show(Request $request)
    {
        $supplyer = supplyer::find($request->id);
        return response()->json(['supplyer' => $supplyer]);
    }

    // edit
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company_name' => 'required',
            'total' => 'required',
        ]);

        if (!$validator->fails()) {
            // return response()->json(['success' => $request->name]);
            $supplyer = supplyer::find($request->id);
            $supplyer->name = $request->name;
            $supplyer->number = $request->contact_number;
            $supplyer->company_name = $request->company_name;
            $supplyer->total = $request->total;
            $supplyer->payment = $request->payment;
            $supplyer->invoice_no = $request->invoice_no;
            if ($request->payment == $request->total) {
                $supplyer->due = '0';
            } elseif (is_null($request->payment)) {
                $supplyer->due = $request->total;
            } else {
                $supplyer->due = $request->total - $request->payment;
            }
            if ($request->payment == $request->total) {
                $supplyer->status = 'paid';
            } elseif (is_null($request->payment)) {
                $supplyer->status = 'unpaid';
            } elseif ($request->payment < $request->total) {
                $supplyer->status = 'partial paid';
            }
            if ($request->payment > $request->total) {
                return response()->json(['warning' => 'Payment is grater than total amount!',]);
            } else {
                $supplyer->save();
                return response()->json(['success' => 'Updated Successfully!',]);
            }
        } else {
            return response()->json(['fails' => $validator->errors(),]);

        }
    }

    //delete
    public function delete(Request $request)
    {
        $supplyer = supplyer::find($request->id)->delete();
        return response()->json(['success' => ' supplyer Deleted Successfully!']);
    }



    //search
    public function search(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) {
            $supplyers = supplyer::where('name', 'like', '%' . $search . '%')->orwhere('company_name', 'like', '%' . $search . '%')->orwhere('status', 'like', '%' . $search . '%')->orwhere('invoice_no', 'like', '%' . $search . '%')->get();

            if ($supplyers->count() >= 1) {
                return view('admin.pages.supplyer.search', compact('supplyers'));
            } else {

                return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
            }
        }
         else {
            $supplyers = supplyer::latest()->get();
            return view('admin.pages.supplyer.search', compact('supplyers'));
            // return response()->json(['null' => 'search vlaue null']);
        }

    }

    //print
    public function print()
    {
        $supplyers = supplyer::latest()->get();
        return view('admin.pages.supplyer.search', compact('supplyers'));
    }
}
