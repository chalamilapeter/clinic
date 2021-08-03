<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pharmacist;
use App\Models\Admin\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PharmacistController extends Controller
{

    public function create()
    {
       $pharmacies = Pharmacy::all();

       return view('admin.pharmacists.create', compact('pharmacies'));
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

                'pharmacy_id' => 'required',

            ]);

            $user = new User;
            $user->email = $data['email'];
            $user->role_id = 5;
            $user->password = Hash::make($data['password']);
            $user->save();

            $file = $request->first_name . "-" . $request->last_name ."-".uniqid() ."-". 'profile_img' . '.' . $request->image_path->extension();

            $request->image_path->move(public_path() . '/img/pharmacists', $file);

            $path = '/img/pharmacists/'.$file;

            $user->pharmacist()->create([
                'pharmacy_id'=> $data['pharmacy_id'],
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
            ]);
        });

        return back()->with('success', 'Pharmacist created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacist $pharmacist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacist $pharmacist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacist $pharmacist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacist $pharmacist)
    {
        //
    }
}
