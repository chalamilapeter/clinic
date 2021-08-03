<?php

namespace App\Http\Controllers;

use App\Models\Admin\Lab;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index()
    {
        if(auth()->user()->role->name == 'Patient' || auth()->user()->role->name == 'Doctor'){
            if(auth()->user()->role->name == 'Patient'){
                return view('patient.complaints.index');
            }
            else {

                $complaints = Complaint::where('doctor_id', auth()->id())->latest()->paginate(5);
                return view('doctor.complaints.index', compact('complaints'));
            }
        }
        else{
            abort(403);
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


    public function store(Request $request)
    {
        if(auth()->user()->role->name != "Patient"){
            abort (403);
        }
        else{
            $data = $request->validate([
                'message' => 'required|min:10'
            ]);

            $complaint = new Complaint;
            $complaint->user_id = auth()->id();
            $complaint->doctor_id = auth()->user()->patient->doctor_id;
            $complaint->message = $data['message'];
            $complaint->save();

            return back()->with('success', 'Your complaint log has been submitted');
        }
    }


    public function show(Complaint $complaint)
    {
        $labs = Lab::all();
        return view('doctor.complaints.show', compact('complaint', 'labs'));
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
