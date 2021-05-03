<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
      return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles'
        ]);

        Role::create($data);
        return redirect()->route('roles.index')->with('success', 'Role Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success', 'Role Deleted');
    }
}
