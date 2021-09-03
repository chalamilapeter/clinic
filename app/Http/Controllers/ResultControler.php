<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultControler extends Controller
{

    public function index()
    {
        if (auth()->user()->role_id === 3){
            $patient = auth()->user()->patient;
            $complaints = Complaint::where('patient_id', $patient->id)->pluck('id')->toArray();
            $diagnoses = Diagnosis::whereIn('complaint_id', $complaints)->pluck('id')->toArray();
            $results = Result::whereIn('complaint_id', $complaints)
                ->orWhereIn('diagnosis_id', $diagnoses)
                ->latest()
                ->paginate(5);
            $doctor = $patient->doctor->last_name . ", " . $patient->doctor->first_name;
            return view('patient.results.index', compact('results', 'doctor'));
        }
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


    public function show(Result  $result)
    {
        if (auth()->user()->role_id === 3){

            return view('patient.results.show', compact('result'));
        }
//        $diagnosis = Diagnosis::find($result);
//
//        return view('doctor.results.show', compact('diagnosis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
