<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::orderBy('name', 'ASC')->get();
        return view('admin.pages.product.index', compact('products'));
    }
    //store
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name',
            'purchasing_price' => 'required',
            'selling_price' => 'required',
            'category' => 'required',
        ]);

        if (!$validator->fails()) {
            $product = new product();
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->purchasing_price = $request->purchasing_price;
            $product->selling_price = $request->selling_price;
            $product->quentity = $request->quentity;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $product->name . '-' . uniqid(50) . '.' . $image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('product_image')) {
                    Storage::disk('public')->makeDirectory('product_image');
                }

                $image_size = Image::make($image)->resize(100, 100)->stream();
                Storage::disk('public')->put('product_image/' . $image_name, $image_size);
                $product->image = $image_name;
            }

            $product->save();
            return response()->json(['success' => 'New product Added Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //show
    public function show(Request $request)
    {
        $product = product::find($request->id);
        return response()->json(['product' => $product]);
    }

    // edit
    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'purchasing_price' => 'required',
            'selling_price' => 'required',
            'category' => 'required',
        ]);

        if (!$validator->fails()) {
            $product = product::find($request->id);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->purchasing_price = $request->purchasing_price;
            $product->selling_price = $request->selling_price;
            $product->quentity = $request->quentity;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $product->name . '-' . uniqid(50) . '.' . $image->getClientOriginalExtension();

                if (!Storage::disk('public')->exists('product_image')) {
                    Storage::disk('public')->makeDirectory('product_image');

                }
                if(Storage::disk('public')->exists('product_image/' . $product->image)){
                    Storage::disk('public')->delete('product_image/' . $product->image);
                }

                $image_size = Image::make($image)->resize(100, 100)->stream();
                Storage::disk('public')->put('product_image/' . $image_name, $image_size);
                $product->image = $image_name;
            }
            $product->save();
            return response()->json(['success' => ' product Updated Successfully!',]);
        } else {
            return response()->json(['fails' => $validator->errors(),]);
        }
    }

    //delete
    public function delete(Request $request)
    {
        $product = product::find($request->id)->delete();
        return response()->json(['success' => ' product Deleted Successfully!']);
    }

    //status control
    public function status(Request $request)
    {
        $product = product::find($request->id);
        if ($product->status == 0) {
            $product->status = '1';
            $product->save();
            return response()->json(['success' => ' product Activated Successfully!']);
        } else {
            $product->status = '0';
            $product->save();
            return response()->json(['success' => ' product Deactivated Successfully!']);
        }
    }

    //search
    public function search(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) {

            $products = product::where('name', 'like', '%' . $search . '%')->get();
        } else {
            return response()->json(['null' => 'search vlaue null']);
        }

        if ($products->count() >= 1) {

            return view('admin.pages.product.search', compact('products'));
        } else {
            return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
        }
    }

    //print
    public function print(){
        $products = Product::latest()->get();
        return view('admin.pages.product.search', compact('products'));
    }



}
