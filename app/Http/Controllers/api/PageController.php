<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $model=Homepage::first()??null;

        // $exists=null;
        
        // if($model){

        //     $exists=true;

        // }else{

        //     $exists=false;
        // }

        // return response()->json(['data'=>$model,'exists'=>$exists]);

        return response()->json(['data'=>$model]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
