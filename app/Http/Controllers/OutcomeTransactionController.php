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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $outcome_transaction = OutcomeTransaction::find($id);
        if($outcome_transaction){
            $update = $outcome_transaction->update([
                'type' => $request->type ?? $outcome_transaction->type,
                'name' => $request->name ?? $outcome_transaction->name,
                'funding_id' =>empty($request->funding_id) ? $outcome_transaction->funding_id : ($request->funding_id == 'null' ? null : $request->funding_id),
                'fixed_cost_id' => empty($request->fixed_cost_id) ? $outcome_transaction->fixed_cost_id : ($request->fixed_cost_id == 'null' ? null : $request->fixed_cost_id),
                'payment_method' => $request->payment_method ?? $outcome_transaction->payment_method,
                'nominal' => $request->nominal ?? $outcome_transaction->nominal,
                'status' => $request->status ?? $outcome_transaction->status,
                'updated_at' => Carbon::now()
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
     * @param  \App\Models\OutcomeTransactions  $outcomeTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outcome_transaction = OutcomeTransaction::find($id);
        if($outcome_transaction){
            $delete = $outcome_transaction->delete();
            
            if($delete){
                return response('Delete Success');
            }

            return response('Delete Failed', 400);

        }

        return response('Data Not Found', 400);
    }
}
