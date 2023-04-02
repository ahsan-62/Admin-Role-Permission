<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('index-role');
        $roles=Role::with(['permissions:id,permission_name,permission_slug'])->select(['id','is_deleteable','role_name','role_slug','role_note','updated_at'])->get();
        // return $roles;
        return view('Admin.layouts.pages.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create-role');
        $modules=Module::with('permissions:id,permission_name,permission_slug,module_id')->select(['id','module_name'])->get();
        // return $modules;
        return view('Admin.layouts.pages.role.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        Role::updateOrCreate([
            'role_name'=>$request->role_name,
            'role_slug'=>Str::slug($request->role_slug),
            'role_note'=>$request->role_note,
        ])->permissions()->sync($request->input('permissions',[]));

        Toastr::success('Role Added Succesfully');
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with(['permissions'])->find($id);
        $modules = Module::with(['permissions:id,module_id,permission_name,permission_slug'])->select(['id', 'module_name'])->get();
        return view('Admin.layouts.pages.role.edit', compact('modules', 'role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        $role->update([
            'role_name' => $request->role_name,
            'role_slug' => Str::slug($request->role_name),
            'role_note' => $request->role_note,
        ]);
        $role->permissions()->sync($request->input('permissions', []));

        Toastr::success('Role updated Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete-role');
        $role=Role::find($id);
        if($role->is_deleteable){
            $role->delete();
            Toastr::success('Role deleted Successfully');
            return redirect()->route('role.index');
        }
        Toastr::error("Role cann't be deleted!!!");
        return redirect()->route('role.index');

    }
}
