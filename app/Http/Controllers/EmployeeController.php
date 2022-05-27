<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    public function add_index(Request $request){
        $role = Role::all();
        return view('admin.employee-add',compact('role'));
    }

    public function index(Request $request){
        // dd(Auth::user()->role->role);
        $data = User::all();
        return view('admin.employeelist',compact('data'));
    }



    public function store(Request $request)
    {
          
         $data = new Role;
         $data->role = $request->input('occupation');
         $data->save();
         
         Session::flash('occupation','Occupation added successfully.');

         return redirect('/employeelist');
    }

    public function add(Request $request)
    {
          
         $data = new User;
         $data->name = $request->input('name');
         $data->role_id = $request->input('occupation');
         $data->email = $request->input('email');
         $data->password = Hash::make($request->input('password'));
         $data->save();
         
         Session::flash('emp_add','Employee added successfully.');

         return redirect('/employeelist');
    }

    public function edit(Request $request, $id){
        $user = User::findOrFail($id);

        return view('admin.employee-edit',compact('user'));
    }

    public function update(Request $request, $id)
    {


        $user = User::find($id);

        $user->name = $request->input('name');
        $user->role_id = $request->input('occupation');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        Session::flash('updated','The Employee has been successfully Updated.');

        return redirect('/employeelist');
    }

}
