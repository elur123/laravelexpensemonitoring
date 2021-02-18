<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clients')->with(
            [
                'clients'=> Client::all(),
                'users' => User::all(),
                'customers' => Customer::all(),
                'products' => Product::all(),
                'stats' => $this->GetStatistics()
            ]);
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
        $client = new Client;
        $client->main_user_id = $request->main_user;
        $client->customer_id = $request->customer;
        $client->product_id = $request->product;
        $client->qty = $request->qty;
        $client->price = $request->price;
        $client->unit = $request->unit;
        $client->total = $request->qty * $request->price;
        $client->status = $request->status;
        $client->paid_user_id = $request->paid_user;
        $client->method = $request->method;
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Transaction Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $client = Client::find($request->id);
        $client->main_user_id = $request->main_user;
        $client->product_id = $request->product;
        $client->qty = $request->qty;
        $client->price = $request->price;
        $client->unit = $request->unit;
        $client->total = $request->qty * $request->price;
        $client->status = $request->status;
        $client->paid_user_id = $request->paid_user;
        $client->method = $request->method;
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Transaction Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Transaction Has Been Deleted Successfully');
    }

    function StoreCustomer(Request $request){
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->description = $request->description;
        $customer->status = $request->status;
        $customer->save();

        return redirect()->route('clients.index')->with('success', 'Client Has Been Created Successfully');
    }

    function GetStatistics(){
        $user1 = Client::where('main_user_id', 1)->get();
        $user2 = Client::where('main_user_id', 2)->get();

        $user_pending1 = 0;
        $user_paid1 = 0;
        $bank_user1 = 0;
        $paypal_user1 = 0;
        $cash_user1 = 0;

        $user_pending2 = 0;
        $user_paid2 = 0;
        $bank_user2 = 0;
        $paypal_user2 = 0;
        $cash_user2 = 0;

        foreach ($user1 as $key => $value) {
            if ($value->status == 'Active'){
                $user_paid1 += $value->total;
            }
            if ($value->status == 'Pending'){
                $user_pending1 += $value->total;
            }
            if ($value->method == "Bank") {
                $bank_user1 += $value->total;
            }
            if ($value->method == "Cash") {
                $cash_user1 += $value->total;
            }
            if ($value->method == "Paypal") {
                $paypal_user1 += $value->total;
            }
        }
        foreach ($user2 as $key => $value) {
            if ($value->status == 'Active'){
                $user_paid2 += $value->total;
            }
            if ($value->status == 'Pending'){
                $user_pending2 += $value->total;
            }
            if ($value->method == "Bank") {
                $bank_user2 += $value->total;
            }
            if ($value->method == "Cash") {
                $cash_user2 += $value->total;
            }
            if ($value->method == "Paypal") {
                $paypal_user2 += $value->total;
            }
        }

        return ['user_paid1' => $user_paid1, 'user_pending1' => $user_pending1, 'bank_user1' => $bank_user1, 'paypal_user1' => $paypal_user1, 'cash_user1' => $cash_user1,
        'user_paid2' => $user_paid2, 'user_pending2' => $user_pending2, 'bank_user2' => $bank_user2, 'paypal_user2' => $paypal_user2, 'cash_user2' => $cash_user2];
    }

}
