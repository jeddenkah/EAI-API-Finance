<?php

namespace App\Http\Controllers;

use App\Models\FixedCost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FixedCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->id){
            $fixed_cost = FixedCost::all();

        }else{
            $fixed_cost = FixedCost::find($request->id);
            if(!$fixed_cost){
                return response('Data Not Found', 400);
            }
        }

        return response()->json($fixed_cost);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = FixedCost::insert([
            'divisi_id' => $request->divisi_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ?? 'active',
            'nominal' => $request->nominal,
            'every' => $request->every,
            'date' => Carbon::parse($request->date),
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
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fixed_cost = FixedCost::find($id);
        if($fixed_cost){
            $update = $fixed_cost->update([
                'divisi_id' => $request->divisi_id ?? $fixed_cost->divisi_id,
                'name' => $request->name ?? $fixed_cost->name,
                'description' => $request->description ?? $fixed_cost->description,
                'status' => $request->status ?? $fixed_cost->status,
                'nominal' => $request->nominal ?? $fixed_cost->nominal,
                'every' => $request->every ?? $fixed_cost->every,
                'date' => Carbon::parse($request->date ?? $fixed_cost->date),
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
     * @param  \App\Models\FixedCost  $fixedCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fixed_cost = FixedCost::find($id);
        if($fixed_cost){
            $delete = $fixed_cost->delete();
            
            if($delete){
                return response('Delete Success');
            }

            return response('Delete Failed', 400);

        }

        return response('Data Not Found', 400);
    }
}
