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
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $surgeons = Surgeon::orderBy('name', 'ASC')->paginate(5);

        return view('surgeons.index', compact('surgeons'))
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
						'name'  => 'required',
						'email' => 'required|email'
        ]);

        Surgeon::create( $request->all() );

        return redirect()->route('surgeons.index')->with('success', 'Surgeon created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function show(Surgeon $surgeon)
    {
        return view('surgeons.show', compact('surgeon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgeon $surgeon)
    {
        return view('surgeons.edit', compact('surgeon'));
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
        $this->validate($request, [
					'name'  => 'required',
					'email' => 'required|email'
        ]);

        $surgeon->update( $request->all() );

        return redirect()->route('surgeons.index')->with('success', 'The surgeon has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surgeon  $surgeon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgeon $surgeon)
    {
        $surgeon->delete();

        return redirect()->route('surgeons.index')->with('success', 'The surgeon has been deleted');
    }
}
