<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class posController extends Controller
{
    //pos index
    public function index(){
        return view('admin.pages.pos.index');
    }
}
