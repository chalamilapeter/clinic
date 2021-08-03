<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosisController extends Controller
{

    public function index()
    {
        if (auth()->user()->role->name == "Patient" || auth()->user()->role->name == "Admin" || auth()->user()->role->name == "Doctor")
        {
            if(auth()->user()->role->name == "Patient")
            {
                $diagnosis = Diagnosis::where('patient_id',auth()->id())->get();

                return view('patient.diagnosis.index', compact('diagnosis'));
            }
            elseif(auth()->user()->role->name == "Admin")
            {
                $diagnoses = Diagnosis::all();

                return view('admin.diagnosis.index', compact('diagnoses'));
            }
            else
            {
                $diagnoses = Diagnosis::where('user_id', auth()->id())->latest()->paginate(5);

                return view('doctor.diagnosis.index', compact('diagnoses'));
            }
        }
        else{
            abort (403);
        }
    }

    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $data = $request->validate([
                'user_id' =>'',
                'complaint_id' => '',
                'patient_id' => '',
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
