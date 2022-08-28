<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class posController extends Controller
{
    //pos index
    public function index(){
        return view('admin.pages.pos.index');
    }
    //category product
    public function category_product(Request $request){
        $category = Category::find($request->id);

        $category_products = $category->products;
        return view('admin.pages.pos.category_product', compact('category_products'));
        // return $category_products;
    }
    //product all
        public function all_product(){
        $category_products = Product::where('status', true)->orderBy('name', 'ASC')->get();
        return view('admin.pages.pos.category_product', compact('category_products'));
        }
    //product search
    public function product_search(Request $request){
        $search = $request->data;
        if (!is_null($search)) {
            $category_products = product::where('name', 'like', '%' . $search . '%')->get();
            if ($category_products->count() >= 1) {

                return view('admin.pages.pos.category_product', compact('category_products'));
            } else {
                return response()->json(['not_found' => 'No Data Found.', 'search' => $request->search]);
            }
        }else{
            $category_products = Product::where('status', true)->orderBy('name', 'ASC')->get();
            return view('admin.pages.pos.category_product', compact('category_products'));
        }

    }
}
