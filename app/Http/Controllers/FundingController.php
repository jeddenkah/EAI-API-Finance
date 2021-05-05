<?php

namespace App\Http\Controllers;

use App\Models\Funding;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FundingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->id){
            $fundings = Funding::all();

        }else{
            $fundings = Funding::find($request->id);
            if(!$fundings){
                return response('Data Not Found', 400);
            }
        }

        return response()->json($fundings);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Funding::insert([
            'divisi_id' => $request->divisi_id,
            'title' => $request->title,
            'description' => $request->description,
            'nominal' => $request->nominal,
            'status' => 'sent',
            'attachment' => $request->attachment,
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
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funding = Funding::find($id);
        if($funding){
            $update = $funding->update([
                'divisi_id' => $request->divisi_id ?? $funding->divisi_id,
                'title' => $request->title ?? $funding->title,
                'description' => $request->description ?? $funding->description,
                'nominal' => $request->nominal ?? $funding->nominal,
                'status' => $request->status ?? $funding->status,
                'attachment' => $request->attachment ?? $funding->attachment,
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
     * @param  \App\Models\Funding  $funding
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funding = Funding::find($id);
        if($funding){
            $delete = $funding->delete();
            
            if($delete){
                return response('Delete Success');
            }

            return response('Delete Failed', 400);

        }

        return response('Data Not Found', 400);
    }
}
