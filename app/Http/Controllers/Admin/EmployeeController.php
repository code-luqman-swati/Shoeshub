<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

 
    /**
     * Show Add Employee page
     */
    public function create()
    {
        return view('admin.employees.create');
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
            'role'     => 'required|in:admin,staff,customer',
            'status'   => 'required|boolean',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => $request->role,
            'status'   => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.employees.index')
            ->with('success', 'Employee added successfully.');
    }

    public function index()
    {
        $employees = User::whereIn('role', ['admin', 'staff'])->get();
        return view('admin.employees.index', compact('employees'));
    }
    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }



public function update(Request $request, $id)
{
    $employee = User::findOrFail($id);

    $employee->update([
        'name'   => $request->name,
        'email'  => $request->email,
        'phone'  => $request->phone,
        'role'   => $request->role,
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
