<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleStoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules=Module::select(['id','module_name','module_slug','updated_at'])->latest()->get();
        // return $modules;
        return view('Admin.layouts.pages.module.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.layouts.pages.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleStoreRequest $request)
    {
        Module::updateOrCreate([
            'module_name'=> $request->module_name,
            'module_slug'=>Str::slug($request->module_name),

        ]);
        Toastr::success('Module Added Successfully');
        return redirect()->route('module.index');
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
        $module=Module::find($id);
        return view('Admin.layouts.pages.module.edit',compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleStoreRequest $request, $id)
    {
        // dd($request->all(),$id);
        $module=Module::find($id);
        $module->update([
            'module_name'=> $request->module_name,
            'module_slug'=>Str::slug($request->module_name),

        ]);
        Toastr::success('Module Updated Successfully');
        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module=Module::find($id);
        $module->delete();

        Toastr::success('Module Deleted Successfully');
        return redirect()->route('module.index');
    }
}
