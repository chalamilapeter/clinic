<?php

namespace App\Http\Controllers;

use App\Classes\SMS;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\LabResult;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class LabResultController extends Controller
{
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

    public function store(Request $request)
    {

       $data =  $request->validate([
            'diagnosis_id'=>'',
            'test_document' => 'required|mimes:pdf,jpg,png|max:2048',
            'remarks' => ''
        ]);

        $diag = Diagnosis::find($request->diagnosis_id);

        $name = $diag->complaint->patient->first_name."-".$diag->complaint->patient->last_name;

        $filename = $name."-lab-results-".uniqid().".".$request->test_document->extension();

        $request->test_document->move(public_path('documents/lab-results'), $filename);

        $lab_result = new LabResult;
        $lab_result->diagnosis_id = $data['diagnosis_id'];
        $lab_result->lab_technician_id = auth()->user()->lab_technician->id;
        $lab_result->test_document = $filename;
        $lab_result->remarks = $data['remarks'];

        $lab_result->save();

        $doctor = Doctor::find($lab_result->diagnosis->complaint->doctor_id);

        $patient = $lab_result->diagnosis->complaint->patient;

        $sms = new SMS();
        $message = 'Dr. ' . $doctor->last_name . ', ' . $patient->first_name . ' ' . $patient->last_name . " test results have been uploaded from " . $lab_result->diagnosis->lab->name;
        $sms->sendSingleSMS($doctor->phone, $message);

        return redirect()->route('lab_tech.create')->with('success', 'Test results uploaded');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabResult  $labResult
     * @return \Illuminate\Http\Response
     */
    public function show($labResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabResult  $labResult
     * @return \Illuminate\Http\Response
     */
    public function edit(LabResult $labResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabResult  $labResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabResult $labResult)
    {
        //
    }


    public function destroy(LabResult $labResult)
    {
        //
    }

    public function download(LabResult $labResult)
    {
        $file = $labResult->test_document;

        $file = public_path()."/documents/lab-results/".$file;

        $header = array(
            'Content-type: application/pdf',
        );

        return Response::download($file);
    }
}
