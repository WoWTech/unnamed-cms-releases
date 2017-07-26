<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\{Role, Permission};
use Laratrust;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Laratrust::can('create-role'))
            return abort(403);

        $permissions = Permission::get(['id', 'name', 'display_name']);

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (!Laratrust::can('create-role'))
            return abort(403);

        $this->validateRole();

        $role = Role::create(request()->all());

        $role->syncPermissions(request()->role_permissions);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        if (!Laratrust::can('update-role'))
            return abort(403);

        $permissions = Permission::get(['id', 'name', 'display_name', 'description']);

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role)
    {
        if (!Laratrust::can('update-role'))
            return abort(403);

        $this->validateRole();

        $role->update(request(['name', 'display_name', 'description']));

        $role->syncPermissions(request()->role_permissions);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!Laratrust::can('delete-role'))
            return abort(403);

        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    private function validateRole()
    {
        $this->validate(request(), [
            'name'              => 'required|alpha_dash|between:3,30',
            'display_name'      => 'required|regex:/^[\pL\s]+$/u|between:3,40',
            'description'       => 'required|between:3,200',
            'role_permissions'  => 'required|array|min:1',
        ]);
    }
}
