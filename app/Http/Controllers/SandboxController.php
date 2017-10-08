<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function getSandbox()
    {
        $products = Product::paginate(10);
        $categories = Category::all();
        return view("home")->with("products", $products)->with("categories", $categories);
    }
}
