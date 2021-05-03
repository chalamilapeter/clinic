<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Lab;
use App\Models\Admin\LabTechnician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LabTechnicianController extends Controller
{

    public function create()
    {
        $labs = Lab::all();

        return view('admin.lab_technicians.create', compact('labs'));
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

                'lab_id' => 'required',

            ]);

            $user = new User;
            $user->email = $data['email'];
            $user->role_id = 4;
            $user->password = Hash::make($data['password']);
            $user->save();

            $user->lab_technician()->create([
                'lab_id'=> $data['lab_id'],
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

        return redirect()->route('labs.index')->with('success', 'Technician created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\LabTechnician  $labTechnician
     * @return \Illuminate\Http\Response
     */
    public function show(LabTechnician $labTechnician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\LabTechnician  $labTechnician
     * @return \Illuminate\Http\Response
     */
    public function edit(LabTechnician $labTechnician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\LabTechnician  $labTechnician
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabTechnician $labTechnician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\LabTechnician  $labTechnician
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabTechnician $labTechnician)
    {
        //
    }
}
