<?php

namespace App\Http\Controllers;

use PDF;
use Uploader;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $termProduct = $request->get("product");
        $termCategory = $request->get("category");

        $products = Product::with("category");
        $categories = Category::all();

        if ($termProduct)
        {
            $products = $products->where("name", "LIKE", "%". $termProduct . "%");
        }

        if ($termCategory) 
        {
           $products = $products->where("category_id", $termCategory);
        }

        $products = $products->paginate(5);
        return view("products.index")->withProducts($products)->with("categories", $categories);
    }

    public function form(Product $product = null)
    {
        $categories = Category::all();
        $product = $product ?: new Product;
        return view("products.form")->with("product", $product)->with("categories", $categories);
    }

    public function post(ProductRequest $request)
    {
        $product = Product::firstOrNew(["id" => $request->get("id")]);       
        // $product = $request->get("id") ? Product::find($request->get("id")) : new Product
        $product->name = $request->get("name");
        $product->category_id = $request->get("category_id");
        $product->description = $request->get("description");
        $product->size = $request->get("size");

        // If Image Was Provided
        if($request->file("image")) {
            $uploadedFile = Uploader::upload($request->file('image'), 'products')->watermark();
            $product->image = $uploadedFile->saveFileName;
        }

        $product->save();

        return redirect()->route("product.index");
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function downloadProducts () {
        $products = Product::all();
        return PDF::loadView("products.download", ['products' => $products])->download('download.pdf');
    }

}
