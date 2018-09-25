<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'name'                  => 'required|min:3|max:191',
            'price'                 => 'required|numeric',
            'description'           => 'required',
            'picture'               => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        // upload the photo
        $productName = time().'.'.$request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('store-pictures'), $productName);


        // save to database
        Product::create([
            'name'  => $request->name,
            'price'  => $request->price,
            'description'  => $request->description,
            'picture'  => $productName
        ]);

         return redirect('product')->with('status', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->validate($request, [
            'name'                  => 'required|min:3|max:191',
            'price'                 => 'required|numeric',
            'description'           => 'required',
            'picture'               => 'sometimes|required|mimes:jpeg,png,gif,jpg',
        ]);


        // upload the photo
        $productName = $product->picture;

        if ($request->picture != "") {
            $productName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('store-pictures'), $productName);
        }

        // save to database
       $product->update([
            'name'  => $request->name,
            'price'  => $request->price,
            'description'  => $request->description,
            'picture'  => $productName
        ]);

       return back()->with('status', 'Product Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product')->with('status', 'Product Delete');
    }
}
