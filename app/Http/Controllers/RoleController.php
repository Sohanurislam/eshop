<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create(Role $role)
    {
        $permissions = Permission::pluck('name','id')->toArray();
        $selectedPermissions = $role->permissions->pluck('id')->toArray();
        return view('backend.roles.create',compact('permissions','selectedPermissions'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles|max:100',
        ]);

        $requestData = $request->all();
        Role::create($requestData);

        return redirect()->route('roles.index')->withStatus('Create was successful!');
    }


    public function show(Role $role)//dependency injection
    {
        return view('backend.roles.show', compact('role'));
    }


    public function edit(Role $role)
    {
        $permissions = Permission::pluck('name','id')->toArray();
        $selectedPermissions = $role->permissions->pluck('id')->toArray();

        return view('backend.roles.edit', compact('role','permissions','selectedPermissions'));
    }


    public function update(Request $request, Role $role)
    {
        $data = $request->all();

        $role->update(['name'=>$request->name]);

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.index')->withStatus('Update was successful!');
    }


    public function destroy(Role $role)
    {

        try {
            $role->delete();

            return redirect()->route('roles.index')->withStatus(' Delete was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

}


