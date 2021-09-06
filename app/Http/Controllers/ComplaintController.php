<?php

namespace App\Http\Controllers;

use App\Classes\SMS;
use App\Models\Admin\Lab;
use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\Result;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index()
    {
        if(auth()->user()->role->name == 'Patient' || auth()->user()->role->name == 'Doctor'){
            if(auth()->user()->role->name == 'Patient'){
                $patient = auth()->user()->patient;
                $complaints = Complaint::where('patient_id', $patient->id)->pluck('id')->toArray();
                $diagnoses = Diagnosis::whereIn('complaint_id', $complaints)->pluck('id')->toArray();
                $results = Result::whereIn('complaint_id', $complaints)
                            ->orWhereIn('diagnosis_id', $diagnoses)
                            ->latest()
                            ->get();
                $previous_date = $results->first()->created_at ?? now();
                $next_date = Carbon::make($results->first()->next_appointment ?? now());
                $doctor = $patient->doctor->last_name . ", " . $patient->doctor->first_name;
                return view('patient.complaints.index', compact('previous_date', 'next_date', 'doctor'));
            }
            else {
                $doctor = auth()->user()->doctor;
                $complaints = Complaint::where('doctor_id', $doctor->id)->latest()->paginate(5);

                return view('doctor.complaints.index', compact('complaints'));
            }
        }
        else{
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if(auth()->user()->role->name != "Patient"){
            abort (403);
        }
        else{
            $data = $request->validate([
                'message' => 'required|min:10'
            ]);

            $patient = auth()->user()->patient;


            $patient->complaints()->create([
                'doctor_id' => auth()->user()->patient->doctor_id,
                'message' => $data['message'],
            ]);

            $doctor = $patient->doctor;
            $sms = new SMS();
            $message = 'Dr. ' . $doctor->last_name . ', ' . $patient->first_name . ' ' . $patient->last_name . ' has submitted ' . ($patient->gender === 'Male' ? 'his' : 'her') . ' complaint log. Be sure to check it out.';
            $sms->sendSingleSMS($doctor->phone, $message);

            return back()->with('success', 'Your complaint log has been submitted');
        }
    }


    public function show(Complaint $complaint)
    {
        $date = date('Y-m-d', strtotime($complaint->created_at->addMonths($complaint->patient->disease->months_interval)));
        return view('doctor.complaints.show', compact('complaint', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
