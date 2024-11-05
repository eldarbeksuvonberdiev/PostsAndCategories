<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function index(){
        $models = Category::orderBy('id','desc')->paginate(10);
        return view('adminPages.category',['models'=>$models]);
    }
}
