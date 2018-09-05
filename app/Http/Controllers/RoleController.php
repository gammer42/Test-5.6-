<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('layouts.templetes.Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('layouts.templetes.Roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'permissions' => 'required'
        ]);

        $storeRole = new Role();

        $storeRole->name = $request->name;
        $storeRole->display_name = $request->display_name;
        $storeRole->description = $request->description;

        $storeRole->save();

        foreach ($request->input('permissions') as $key => $value){
            $storeRole->attachPermission($value);
        }

        Session::flash('message','Role added successfully!');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_role = Role::find($id);

        $show_permission = DB::table('permission_role')
            ->join('permissions','permission_role.permission_id','=','permissions.id')
            ->select('permissions.name','permissions.id')
            ->where('role_id',$id)->orderBy('permissions.id', 'asc')->get();
        return view('layouts.templetes.Roles.show', compact('show_role','show_permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checked = DB::table('permission_role')->where('role_id', $id)->pluck('permission_id')->toArray();
        $permissions = Permission::all();
        $edit_role = Role::find($id);
        return view('layouts.templetes.Roles.edit',compact('edit_role','permissions', 'checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'permissions' => 'required'
        ]);

        $updateRole = Role::find($id);

        $updateRole->name = $request->name;
        $updateRole->display_name = $request->display_name;
        $updateRole->description = $request->description;

        $updateRole->save();

        DB::table('permission_role')->where('permission_role.role_id',$id)->delete();

        foreach ($request->input('permissions') as $key => $value){
            $updateRole->attachPermission($value);
        }

        Session::flash('message','Role updated successfully!');
        return redirect()->route('roles.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::whereId($id)->delete();
        Session::flash('message','Role Deleted Successfully!!!');
        return redirect()->back();
    }
}
