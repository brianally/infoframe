<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Surgeon;

class PatientController extends Controller
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
        $patients = Patient::with('surgeon')->orderBy('name', 'ASC')->paginate(5);

        return view( 'patients.index', compact('patients') )
          ->with('i', ($request->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Patient::$genders;
        $surgeons = Surgeon::pluck('name', 'id');

        return view( 'patients.create', compact('genders', 'surgeons') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        Patient::create( $request->all() );

        return redirect()->route('patients.index')->with('success', 'Patient created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $genders  = Patient::$genders;
        
        return view( 'patients.show', compact('patient', 'genders') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $genders  = Patient::$genders;
        $surgeons = Surgeon::pluck('name', 'id');

        return view( 'patients.edit', compact('patient', 'genders', 'surgeons') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PatientRequest $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $patient->update( $request->all() );

        return redirect()->route('patients.index')->with('success', 'Patient updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        
        return redirect()->route('patients.index')->with('success', 'The Patient has been deleted');
    }
}
