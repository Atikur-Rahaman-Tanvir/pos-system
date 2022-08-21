<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    public function index()
    {
        $categorys = category::latest()->get();
        return view('admin.pages.category.index', compact('categorys'));
    }
    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name',
        ]);

        if (!$validator->fails()) {
            $category = new category();
            $category->name = $request->name;
            $category->slug = str::slug($request->name);
            $category->save();
            return response()->json(['success' => 'New category Added Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //show
    public function show(Request $request)
    {
        $category = category::find($request->id);
        return response()->json(['category' => $category]);
    }

    // edit
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if (!$validator->fails()) {
            $category = category::find($request->id);
            $category->name = $request->name;
            $category->slug = str::slug($request->name);
            $category->save();
            return response()->json(['success' => ' category Updated Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //delete
    public function delete(Request $request)
    {
        $category = category::find($request->id)->delete();
        return response()->json(['success' => ' category Deleted Successfully!']);
    }

    //status control
    public function status(Request $request)
    {
        $category = category::find($request->id);
        if ($category->status == 0) {
            $category->status = '1';
            $category->save();
            return response()->json(['success' => ' category Activated Successfully!']);
        } else {
            $category->status = '0';
            $category->save();
            return response()->json(['success' => ' category Deactivated Successfully!']);
        }
    }

    //search
    public function search(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) {

            $categorys = category::where('name', 'like', '%' . $search . '%')->get();
        } else {
            return response()->json(['null' => 'search vlaue null']);
        }

        if ($categorys->count() >= 1) {

            return view('admin.pages.category.search', compact('categorys'));
        } else {
            return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
        }
    }

}
