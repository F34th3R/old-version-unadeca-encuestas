<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
//        dd($request->slug);
        $this->validate($request, [
            'name' => 'required|string|unique:users',
            'description' => 'required|string',
        ]);
        /*
         * TODO
         * Solve the problem of not being able to save the slug field with request->slug
        */
        $roles = Role::create([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
        ]);
        $roles->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:users',
            'slug' => 'required|string|unique:users',
            'description' => 'required|string',
        ]);
        $role->update($request->all());
        return redirect()->route('roles.show', $role->id)
            ->with('info', 'The role was saved successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
