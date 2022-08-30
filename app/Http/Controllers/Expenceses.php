<?php

namespace App\Http\Controllers;

use App\Models\Expencese;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Expenceses extends Controller
{
    //index
    public function index()
    {
        $expenceses = Expencese::latest()->whereDate('created_at', Carbon::today())->get();
        return view('admin.pages.expencese.index', compact('expenceses'));
    }
    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if (!$validator->fails()) {
            $expencese = new expencese();
            $expencese->name = $request->name;
            $expencese->amount = $request->amount;
            $expencese->created_at = Carbon::now();
            $expencese->save();
            return response()->json(['success' => 'New expencese Added Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //show
    public function show(Request $request)
    {
        $expencese = expencese::find($request->id);
        return response()->json(['expencese' => $expencese]);
    }

    // edit
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
        ]);

        if (!$validator->fails()) {
            $expencese = expencese::find($request->id);
            $expencese->name = $request->name;
            $expencese->amount = $request->amount;
            $expencese->save();
            return response()->json(['success' => ' expencese Updated Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //delete
    public function delete(Request $request)
    {
        $expencese = expencese::find($request->id)->delete();
        return response()->json(['success' => ' expencese Deleted Successfully!']);
    }


    //search
    public function search(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) {
            $date = explode('-', $request->search);
            $year = $date[0];
            $month = $date[1];
            $day = $date[2];

            $expenceses = expencese::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
            if ($expenceses->count() >= 1) {
                return view('admin.pages.expencese.search', compact('expenceses'));
            } else {
                return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
            }
        } else {
            return response()->json(['null' => 'search vlaue null']);
        }

    }


    //Expenceses report
    public function report()
    {
        $expenceses = Expencese::select(
            DB::raw("date(created_at) as day"),
            DB::raw('sum(amount) as amount'),
        )->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
        $show_date =  Carbon::now()->format('m-Y');
        return view('admin.pages.expencese_report.index', compact('expenceses', 'show_date'));
    }

    //Expenceses serch by month
    public function monthly_report(Request $request)
    {
        if (!is_null($request->data)) {
            $date = explode('-', $request->data);
            $year = $date[0];
            $month = $date[1];


            $expenceses = Expencese::select(
                DB::raw("date(created_at) as day"),
                 DB::raw('sum(amount) as amount'),
            )->whereMonth('created_at', $month)->whereYear('created_at', $year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
            if ($expenceses->count() >= 1) {
                $show_date = $month . '-' . $year;
                return view('admin.pages.expencese_report.search', compact('expenceses', 'show_date'));
            } else {
                return response()->json(['not_found' => 'Not Found!']);
            }
        }
    }
    //Expenceses serch by year
    public function yearly_report(Request $request)
    {
        if (!is_null($request->data)) {
            $date = explode('-', $request->data);
            $year = $date[0];
            $expenceses = Expencese::select(
                DB::raw("monthName(created_at) as day"),
                DB::raw('sum(amount) as amount'),
            )->whereYear('created_at', $year)->orderBy('created_at', 'ASC')->groupBy('day')->get();
            // return $orders;
            if ($expenceses->count() >= 1) {
                $show_date = $year;
                return view('admin.pages.expencese_report.search', compact('expenceses', 'show_date'));
            } else {
                return response()->json(['not_found' => 'Not Found!']);
            }
        }
    }
}
