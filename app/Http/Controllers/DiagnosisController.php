<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosisController extends Controller
{

    public function index()
    {
        $diagnosis = Diagnosis::all();

        return view('patient.diagnosis.index', compact('diagnosis'));
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


    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $data = $request->validate([
                'user_id' =>'',
                'complaint_id' => '',
                'medication' => 'required',
                'tests' => 'required',
                'critical' => 'required',
                'message' => 'required',
                'lab_id'=> '',
                'required_tests' => '',
                'medication_description' => '',
            ]);
            Diagnosis::create($data);

            $complaint = Complaint::find($data['complaint_id']);

            $complaint->update(['status' => 'diagnosed']);
        });

        return back()->with('success', 'Complaint Diagnosed!');
    }


    public function show($diag)
    {
        $diagnosis = Diagnosis::find($diag);
        return view('patient.diagnosis.show', compact('diagnosis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosis $diagnosis)
    {
        //
    }
}
