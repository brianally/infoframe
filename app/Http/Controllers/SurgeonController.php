<?php

namespace App\Http\Controllers;

use App\Surgeon;
use Illuminate\Http\Request;

class SurgeonController extends Controller
{
    /**
     * constructor
     * 
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function show(Surgeon $surgeon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgeon $surgeon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surgeon $surgeon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgeon $surgeon)
    {
        //
    }
}
