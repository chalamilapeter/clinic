<?php

namespace App\Http\Controllers;

use App\Models\Admin\Disease;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function index()
    {
        if(auth()->user()->role->name == 'Admin'){
            $patients = Patient::all();

            return view('admin.patients.index', compact('patients'));
        }
        elseif (auth()->user()->role->name == 'Doctor'){

            $doctor = auth()->user()->doctor;
            $doctor_patients = $doctor->patients;

            return view('doctor.patients.index', compact('doctor_patients'));
        }
        else{
            abort(403);
        }
    }


    public function create()
    {
        $diseases = Disease::all();
        $doctors = User::where('role_id', 2)->get();

        return view('admin.patients.create', compact('diseases', 'doctors'));
    }


    public function store(Request $request)
    {

        DB::transaction(function() use ($request) {
            $data = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|same:confirm_password',
                'confirm_password' => 'required|same:password',
                'first_name' => 'required',
                'middle_name' => '',
                'last_name' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
                'nationality' => 'required',
                'phone_1' => 'required|unique:patients',
                'phone_2' => 'required|unique:patients',
                'address' => 'required',
                'image_path' => 'required|image|max:2048',
                'disease_id' => 'required',
                'doctor_id' => 'required',
                'appointment_date' => 'required',
            ]);

            $user = new User;
            $user->email = $data['email'];
            $user->role_id = 3;
            $user->password = Hash::make($data['password']);
            $user->save();


            $file = $request->first_name . "-" . $request->last_name ."-".uniqid() ."-". 'profile_img' . '.' . $request->image_path->extension();

            $request->image_path->move(public_path() . '/img/patients', $file);

            $path = '/img/patients/'.$file;

            $user->patient()->create([
                'disease_id' => $data['disease_id'],
                'doctor_id' => $data['doctor_id'],
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'nationality' => $data['nationality'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'image_path' => $path,
                'address' => $data['address'],
                'appointment_date' => $data['appointment_date'],
            ]);
        });

       return back()->with('success', 'Patient created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }


    public function destroy(Patient $patient)
    {
        User::where('id', $patient->user->id)->delete();

        return back()->with('success', 'Patient deleted');
    }
}
