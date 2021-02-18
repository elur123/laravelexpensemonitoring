<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Supplier;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.transaction')->with(
            [
                'transactions'=> Transaction::all(),
                'users' => User::all(),
                'suppliers' => Supplier::all(),
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
        $transaction = new Transaction;
        $transaction->main_user_id = $request->main_user;
        $transaction->supplier_id = $request->supplier;
        $transaction->product_id = $request->product;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->unit = $request->unit;
        $transaction->total = $request->qty * $request->price;
        $transaction->status = $request->status;
        $transaction->paid_user_id = $request->paid_user;
        $transaction->method = $request->method;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction Has Been Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->main_user_id = $request->main_user;
        $transaction->supplier_id = $request->supplier;
        $transaction->product_id = $request->product;
        $transaction->qty = $request->qty;
        $transaction->price = $request->price;
        $transaction->unit = $request->unit;
        $transaction->total = $request->qty * $request->price;
        $transaction->status = $request->status;
        $transaction->paid_user_id = $request->paid_user;
        $transaction->method = $request->method;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction Has Been Deleted Successfully');
    }

    function StoreSupplier(Request $request){
        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->description = $request->description;
        $supplier->status = $request->status;

        $supplier->save();

        return redirect()->route('transactions.index')->with('success', 'Supplier Has Been Created Successfully');
    }

    function GetStatistics(){
        $paid = Transaction::where('status', 'Active')->get();
        $credit = Transaction::where('status', 'Pending')->get();
        $paid_user1 = 0;
        $paid_user2 = 0;
        $credit_user1 = 0;
        $credit_user2 = 0;
        foreach ($paid as $key => $value) {
            if ($value->main_user_id == 1) {
                $paid_user1 += $value->total;
            }
            else{
                $paid_user2 += $value->total;
            }
        }
        foreach ($credit as $key => $value) {
            if ($value->main_user_id == 1) {
                $credit_user1 += $value->total;
            }
            else{
                $credit_user2 += $value->total;
            }
        }

        return ['paid_user1' => $paid_user1, 'paid_user2' => $paid_user2, 'credit_user1' => $credit_user1, 'credit_user2' => $credit_user2];
    }


}
