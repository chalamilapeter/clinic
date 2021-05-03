<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Lab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabController extends Controller
{

    public function index()
    {
        $labs = Lab::all();
        $lab_techs = User::where('role_id', 4)->get();

        return view('admin.labs.index', compact('labs', 'lab_techs'));
    }


    public function create()
    {
        return view('admin.labs.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
           'name' => 'required',
           'location' => 'required',
           'phone' => 'required|unique:labs',
           'email' => 'required|email|unique:labs',
           'website' => 'required|unique:labs'
       ]);

       Lab::create($data);

       return redirect()->route('labs.index')->with('success', 'Laboratory Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        //
    }
}
