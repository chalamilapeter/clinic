<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
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
            'diagnosis_id'=>'required',
            'user_id' => 'required',
            'test_document' => 'required|mimes:pdf|max:2048',
            'remarks' => ''
        ]);

        $diag = Diagnosis::find($request->diagnosis_id);

        $name = $diag->complaint->user->patient->first_name."-".$diag->complaint->user->patient->last_name;

        $filename = $name."-(lab-results)-".uniqid().".".$request->test_document->extension();

        $request->test_document->move(public_path('documents/lab-results'), $filename);

        $lab_result = new LabResult;
        $lab_result->diagnosis_id = $data['diagnosis_id'];
        $lab_result->user_id = $data['user_id'];
        $lab_result->test_document = $filename;
        $lab_result->remarks = $data['remarks'];
        $lab_result->save();

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

    public function download($id)
    {
        $file = public_path()."/documents/".$id;

        $header = array(
            'Content-type: application/pdf',
        );

        return Response::download($file);
    }
}
