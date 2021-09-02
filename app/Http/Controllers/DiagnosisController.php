<?php

namespace App\Http\Controllers;

use App\Models\Admin\Lab;
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
                $patient = auth()->user()->patient;

                $diagnosis = Diagnosis::where('patient_id', $patient->id)->get();

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

        $labs = Lab::all();

        return view('patient.diagnosis.show', compact('diagnosis', 'labs'));
    }

    public function confirm_lab(Request $request)
    {
        $request->validate([
            'lab_id' => 'required',
        ],
        [
            'lab_id.required' => 'Select a lab',
        ]);

        $diagnosis = Diagnosis::find($request->diagnosis_id);

        $diagnosis->update(['lab_id' => $request->lab_id]);

        return back()->with('success', 'Laboratory confirmed! Attend the laboratory as soon as possible to get tested');
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
