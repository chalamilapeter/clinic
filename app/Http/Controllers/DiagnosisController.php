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
                $complaints = $patient->complaints->pluck('id')->toArray();

                $diagnoses = Diagnosis::whereIn('complaint_id', $complaints)->latest()->paginate(5);

                return view('patient.diagnosis.index', compact('diagnoses'));
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

            $request->validate([
                'critical' => 'required',
            ]);

            $complaint = Complaint::find($request->complaint_id);

            $date = Complaint::where('patient_id', $complaint->patient_id)->latest()->first();

            if($request->critical === 'yes'){
                $complaint->result()->create([
                    'critical' => $request->critical,
                    'condition' => 'Critical',
                    'next_appointment' => $date->updated_at->addMonth($complaint->patient->disease->months_interval),
                ]);
            }
            else{

                 $data = $request->validate([
                    'complaint_id' => '',
                    'medication' => 'required_if:tests,no',
                    'tests' => 'required_if:critical,no',
                    'message' => 'required_if:tests,no',
                    'condition' => 'required_if:tests,no',
                    'next_appointment' => 'required_if:tests,no',
                    'required_tests' => 'required_if:tests,yes',
                    'prescription' => 'required_if:medication,add,change',
                ]);

                 if ($data['tests'] === 'yes'){
                    $complaint->diagnosis()->create([
                        'tests' => 'yes',
                        'required_tests' => $data['required_tests'],
                    ]);
                 }
                 else{
                     $complaint->result()->create([
                         'critical' => 'no',
                         'medication' => $data['medication'],
                         'prescription' => $data['prescription'],
                         'message' => $data['message'],
                         'next_appointment' => $data['next_appointment'],
                         'condition' => $data['condition'],
                     ]);

                 }
            }

            $complaint->update(['status' => 'diagnosed']);
        });

        return back()->with('success', 'Complaint diagnosed.');

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
