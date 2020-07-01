<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'DESC')->paginate(5);

        return view('employee.index', compact('employees'));
    }


    public function create()
    {
        $companies = Company::orderBy('created_at', 'DESC')->get();

        return view('employee.create', compact('companies'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:employees',
            'company_id' => 'required'
        ]);

        Employee::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'company_id' => $request->company_id
        ]);

        return redirect()->route('employees.index');
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('employee.show', compact('employee'));
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::orderBy('created_at', 'DESC')->get();

        return view('employee.edit', compact('employee', 'companies'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email',
            'company_id' => 'required'
        ]);
        
        $employee = Employee::findOrFail($id);

        $employee->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'company_id' => $request->company_id
        ]);

        return redirect()->route('employees.index');
    }


    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return redirect()->route('employees.index');
    }
}
