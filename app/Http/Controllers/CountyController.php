<?php

namespace App\Http\Controllers;

use App\models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties = County::all();
        $counties->transform(function($county) {
            $county->country_name = $county->country->name;
            return $county;
        });
        return $counties;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        County::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        //
    }
}
