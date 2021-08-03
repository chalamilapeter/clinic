<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Pharmacist;
use App\Models\Admin\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{

    public function index()
    {
        $pharmacies = Pharmacy::paginate(20);
        $pharmacists = User::where('role_id', 5)->get();

        return view('admin.pharmacies.index', compact('pharmacies', 'pharmacists'));
    }


    public function create()
    {
        return view('admin.pharmacies.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'phone' => 'required|unique:pharmacies',
            'email' => 'required|email|unique:pharmacies',
            'website' => 'required|unique:pharmacies'
        ]);

        Pharmacy::create($data);

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }
}
