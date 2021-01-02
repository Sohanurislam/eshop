<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('permissions'));
    }

    public function create()
    {
//        $permissions = Permission::pluck('name','id')->toArray();
//        $selectedPermissions = $role->permissions->pluck('id')->toArray();
        return view('backend.permissions.create');
    }

    public function store(Request $request)
    {

//        $request->validate([
//            'name' => 'required|unique:roles|max:100',
//        ]);

        $requestData = $request->all();
        Permission::create($requestData);

        return redirect()->route('permissions.index')->withStatus('Create was successful!');
    }


    public function show(Permission $permission)//dependency injection
    {
        return view('backend.permissions.show', compact('permission'));
    }


    public function edit(Permission $permission)
    {

        return view('backend.permissions.edit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $requestData = $request->all();

        $permission->update($requestData);

        return redirect()->route('permissions.index')->withStatus('Update was successful!');
    }


    public function destroy(Permission $permission)
    {

        try {
            $permission->delete();

            return redirect()->route('permissions.index')->withStatus(' Delete was successful!');

        } catch (QueryException $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

}
