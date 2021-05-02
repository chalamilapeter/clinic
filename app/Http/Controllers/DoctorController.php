<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }


    public function create()
    {
        return view('admin.doctors.create');
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
                'image_path' => 'required',

                'speciality' => 'required',

            ]);

            $user = new User;
            $user->email = $data['email'];
            $user->role_id = 2;
            $user->password = Hash::make($data['password']);
            $user->save();

            $user->doctor()->create([
                'speciality' => $data['speciality'],
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'nationality' => $data['nationality'],
                'phone_1' => $data['phone_1'],
                'phone_2' => $data['phone_2'],
                'image_path' => 'img/test.jpg',
                'address' => $data['address'],
            ]);
        });

        return back()->with('success', 'Doctor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
