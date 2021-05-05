<?php

namespace App\Http\Controllers;

use App\Models\OutcomeTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutcomeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->id){
            $outcome_transactions = OutcomeTransaction::all();

        }else{
            $outcome_transactions = OutcomeTransaction::findOrFail($request->id);
        }

        return response()->json($outcome_transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = OutcomeTransaction::insert([
            'type' => $request->type,
            'name' => $request->name,
            'funding_id' => $request->funding_id ?? null,
            'fixed_cost_id' => $request->fixed_cost_id ?? null,
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
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function show(OutcomeTransactions $outcomeTransactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(OutcomeTransactions $outcomeTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutcomeTransactions $outcomeTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutcomeTransactions $outcomeTransactions)
    {
        //
    }
}
