<?php

namespace App\Http\Controllers;

use App\Surgeon;
use Illuminate\Http\Request;
use App\Http\Requests\SurgeonRequest;

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
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surgeons = Surgeon::with('patients')->orderBy('name', 'ASC')->paginate(5);

        return view( 'surgeons.index', compact('surgeons') )
          ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surgeons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SurgeonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurgeonRequest $request)
    {
        Surgeon::create( $request->all() );

        \Session::flash('info', 'Surgeon created');

        return redirect()->route('surgeons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function show(Surgeon $surgeon)
    {
        return view( 'surgeons.show', compact('surgeon') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgeon $surgeon)
    {
        return view( 'surgeons.edit', compact('surgeon') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SurgeonRequest  $request
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function update(SurgeonRequest $request, Surgeon $surgeon)
    {
        $surgeon->update( $request->all() );

        \Session::flash('info', 'The surgeon has been updated');

        return redirect()->route('surgeons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgeon $surgeon)
    {
        if ( $surgeon->patients()->count() )
        {
          return redirect()->back()->withErrors('Patients for this surgeon must be reassigned first.');
        }

        $surgeon->delete();

        \Session::flash('info', 'The surgeon has been deleted');

        return redirect()->route('surgeons.index');
    }
}
