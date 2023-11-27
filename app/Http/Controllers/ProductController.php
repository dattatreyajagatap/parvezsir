<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $getProducts = Product::all();
        $data = compact('getProducts');
        return view('productsdetail')->with($data);
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title="add";
        $product = Product::all();
        // $data = compact('product');
        $url= url('/addproduct');
        $data = compact('product','url', 'title');
        return view('home')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // echo "<pre>";
        // print_r($request->all());

        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'product_category' => 'required',
            'product_price' => 'required',
            'product_about' => 'required',
            'product_desc' => 'required',
        ]);

        // echo "<pre>";
        // print_r($request->all());
        $insertProduct = new Product;

        $insertProduct->product_name = $request['product_name'];
        $insertProduct->product_category = $request['product_category'];
        $insertProduct->product_price = $request['product_price'];
        $insertProduct->product_about = $request['product_about'];
        $insertProduct->product_desc = $request['product_desc'];

        $insertProduct->save();
        return redirect('/product/view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        if(is_null($product)){
            return redirect('/product/view');
        }else{
            $title="update";
            $url= url('/product/update')."/".$id;
            $data = compact('product','url','title');
            return view('home')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);

        $product->product_name = $request['product_name'];
        $product->product_category = $request['product_category'];
        $product->product_price = $request['product_price'];
        $product->product_about = $request['product_about'];
        $product->product_desc = $request['product_desc'];

        $product->save();
        
        return redirect('/product/view');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // echo $id;
        // die;
        Product::find($id)->delete();
        return redirect('/product/view');

    }
}