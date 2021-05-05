<?php

namespace App\Http\Controllers;

use App\Models\IncomeTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->id){
            $income_transactions = IncomeTransaction::all();

        }else{
            $income_transactions = IncomeTransaction::find($request->id);
            if(!$income_transactions){
                return response('Data Not Found', 400);
            }
        }

        return response()->json($income_transactions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = IncomeTransaction::insert([
            'penjualan_id' => $request->penjualan_id ?? null,
            'payment_method' => $request->payment_method,
            'nominal' => $request->nominal,
            'status' => $request->status ?? 'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if($input){
            return response('success');

        }
        return response('failed', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeTransaction  $incomeTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeTransaction $incomeTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeTransaction  $incomeTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $income_transaction = IncomeTransaction::find($id);
        if($income_transaction){
            $update = $income_transaction->update([
                'penjualan_id' => $request->penjualan_id ?? $income_transaction->penjualan_id,
                'payment_method' => $request->payment_method ?? $income_transaction->payment_method,
                'nominal' => $request->nominal ?? $income_transaction->nominal,
                'status' => $request->status ?? $income_transaction->status,
                'updated_at' => Carbon::now(),
            ]);
            
            if($update){
                return response('Update Success');
            }

            return response('Update Failed', 400);

        }

        return response('Data Not Found', 400);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeTransaction  $incomeTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income_transaction = IncomeTransaction::find($id);
        if($income_transaction){
            $delete = $income_transaction->delete();
            
            if($delete){
                return response('Delete Success');
            }

            return response('Delete Failed', 400);

        }

        return response('Data Not Found', 400);

    }
}
