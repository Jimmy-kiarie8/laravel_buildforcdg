<?php

namespace App\Http\Controllers;

use App\models\Constituecy;
use Illuminate\Http\Request;

class ConstituecyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Constituecy::all();
        $constituecy = Constituecy::all();
        $constituecy->transform(function($constituecy) {
            $constituecy->county_name = $constituecy->county->name;
            return $constituecy;
        });
        return $constituecy;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Constituecy::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Constituecy  $constituecy
     * @return \Illuminate\Http\Response
     */
    public function show(Constituecy $constituecy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Constituecy  $constituecy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constituecy $constituecy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Constituecy  $constituecy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constituecy $constituecy)
    {
        //
    }
}
