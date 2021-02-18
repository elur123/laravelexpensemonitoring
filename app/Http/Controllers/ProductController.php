<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\Client;
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
        return view('admin.product')->with(
            [
                'products'=> $this->GetStatistics()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_image = $request->name.'-'.$request->category.'-'.date('Y-m-d').'.png';

        $fileBin = file_get_contents($request->image);
        if (file_put_contents("./myfiles/ProductImage/".$product_image, $fileBin)) {
            $product = new Product;
            $product->name = $request->name;
            $product->category = $request->category;
            $product->status = $request->status;
            $product->image = $product_image;
            $product->qty = 0;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $fileBin = file_get_contents($request->image);
            file_put_contents("./myfiles/ProductImage/".$product->image, $fileBin);
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Has Been Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    function GetStatistics(){
        $remaining_qty = [];
        $product_list = Product::all();
        foreach ($product_list as $key => $value) {
            $product_list[$key]->user1_qty = 0;
            $product_list[$key]->user2_qty = 0;
            $transaction_qty = Transaction::all();
            $client_qty = Client::all();
            foreach ($transaction_qty as $tkey => $tvalue) {
                if ($value->id == $tvalue->product_id) {
                   if ($tvalue->main_user_id == 1) {
                       $product_list[$key]->user1_qty += $tvalue->qty;
                   }
                   else{
                        $product_list[$key]->user2_qty += $tvalue->qty;
                   }
                }
            }
            foreach ($client_qty as $ckey => $cvalue) {
                if ($value->id == $cvalue->product_id) {
                    if ($cvalue->main_user_id == 1) {
                        $product_list[$key]->user1_qty -= $cvalue->qty;
                    }
                    else{
                         $product_list[$key]->user2_qty -= $cvalue->qty;
                    }
                 }
            }
        }

        return $product_list;
    }
}
