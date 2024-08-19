<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view("products.index",["products"=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("products.create",['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        request()->validate([
            "name" => ['required'],
            "description" => ['required'],
            "pro_cat" => ['required', 'exists:categories,id'],
            "price" => ['required']
        ]);

        $name =request()->name;
        $price =request()->price;
        $description =request()->description;
        $pro_cat = request()->pro_cat;

        Product::create([
            "product_name" => $name,
            "product_description" => $description,
            "product_price" => $price,
            "category_id" => $pro_cat
        ]);
        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.show",["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("products.edit",['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            "name" => ['required'],
            "description" => ['required'],
            "pro_cat" => ['required', 'exists:categories,id'],
            "price" => ['required']
        ]);

        $name = request()->name;
        $price = request()->price;
        $description = request()->description;
        $pro_cat = request()->pro_cat;

        $product->update([
            "product_name" => $name,
            "product_description" => $description,
            "product_price" => $price,
            "category_id" => $pro_cat
        ]);
        return to_route('products.show',$product->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route("products.index");
    }
}
