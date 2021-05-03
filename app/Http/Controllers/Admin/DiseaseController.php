<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{

    public function index()
    {
        $diseases = Disease::all();

        return view('admin.diseases.index', compact('diseases'));
    }


    public function create()
    {
        return view('admin.diseases.create');
    }


    public function store(Request $request)
    {
       $data = $request->validate([
           'common_name' => 'required',
           'scientific_name' => 'required',
           'months_interval' => 'required'
       ]);

       Disease::create($data);

       return redirect()->route('diseases.index')->with('success', 'New disease added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit(Disease $disease)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disease $disease)
    {
        //
    }


    public function destroy(Disease $disease)
    {
        $disease->delete();

        return back()->with('success', 'Desease Deleted!');
    }
}
