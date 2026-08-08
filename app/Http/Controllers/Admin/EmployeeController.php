<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class EmployeeController extends Controller
{

 
    /**
     * Show Add Employee page
     */
 public function create()
{
    $roles = Role::all();

    return view('admin.employees.create', compact('roles'));
}

    /**
     * Store employee in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:191',
            'email'    => 'required|email|max:191|unique:users,email',
            'phone'    => 'nullable|string|max:191',
            'role_id' => 'required|exists:roles,id',
            'status'   => 'required|boolean',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
     'role_id' => $request->role_id,
            'status'   => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Employee added successfully.');
    }

   public function index(Request $request)
{
  $employees = User::whereHas('role', function($query){

    $query->whereIn('name', [
        'Admin',
        'Finance',
        'Inventory',
        'Sales'
    ]);

});


    if($request->search){

        $employees->where(function($query) use ($request){

            $query->where('name','like',"%{$request->search}%")
                  ->orWhere('email','like',"%{$request->search}%");

        });

    }


    $employees = $employees->latest()->paginate(10);



    if($request->ajax()){

        return view(
            'admin.employees.table',
            compact('employees')
        );

    }


    return view(
        'admin.employees.index',
        compact('employees')
    );
}
    
    public function edit($id)
{
    $employee = User::findOrFail($id);

    $roles = Role::all();

    return view(
        'admin.employees.edit',
        compact('employee','roles')
    );

    }



public function update(Request $request, $id)
{
    $employee = User::findOrFail($id);

    $employee->update([
        'name'   => $request->name,
        'email'  => $request->email,
        'phone'  => $request->phone,
        'role_id' => $request->role_id,
        'status' => $request->status,
    ]);

    // Update password only if provided
    if ($request->filled('password')) {
        $employee->update([
            'password' => Hash::make($request->password),
        ]);
    }

    return redirect()
        ->route('admin.employees.index')
        ->with('success', 'Employee updated successfully.');
}
public function destroy($id)
{
       $employee = User::findorfail($id);
         $employee->delete();

    return response()->json([
        'success' => 'Employee deleted successfully.'
    ]);
}

}
