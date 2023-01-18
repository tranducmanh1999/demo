<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolesRequest;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->get();

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }

  
    public function store(Request $request)
    {
        $permissions = Permission::find($request->permission);
        
        $role = Role::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        
        foreach ($permissions as $permission) {
            $role->permissions()->attach($permission->id);
            $role->save();
        }    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit',['role' => $role ,'permissions' =>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        $permissions = Permission::find($request->permission);
        $role->permissions()->detach();
        foreach ($permissions as $permission) {
            $role->permissions()->attach($permission->id);
            $role->save();
        }    
        
        return redirect()->route('roles.index')
        ->with('success','Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->delete();
        $role->delete();
        $role->permissions()->detach();


        return redirect('/roles');
    }
}