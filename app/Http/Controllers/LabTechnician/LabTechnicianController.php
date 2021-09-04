<?php

namespace App\Http\Controllers\LabTechnician;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class LabTechnicianController extends Controller
{

    public function index()
    {
        return view('lab_technician.index');
    }

    public function create()
    {
        $diagnoses = Diagnosis::where('lab_id', auth()->user()->lab_technician->lab_id)->latest()->paginate(5);

        return view('lab_technician.diagnosis.index', compact('diagnoses'));

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


    public function show($id)
    {
        $diagnosis = Diagnosis::find($id);

        return view('lab_technician.diagnosis.show', compact('diagnosis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
