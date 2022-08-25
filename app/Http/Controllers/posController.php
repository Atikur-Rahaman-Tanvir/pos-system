<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
