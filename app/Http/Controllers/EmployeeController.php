<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::paginate(10);

        return view('employee.main', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'company' => 'required|exists:companies,id',
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'email' => 'nullable|email',
            'phone' => 'nullable|digits:10'
        ]);


        $employee = new Employee([
            'company_id'    => $validatedData['company'],
            'first_name'    => $validatedData['first_name'],
            'last_name'    => $validatedData['last_name'],
            'email'    => $validatedData['email'],
            'phone'    => $validatedData['phone'],
        ]);

        $employee->save();

        return redirect(route('employees.index'))->with('success', 'Employee has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $companies = Company::all();
        return view('employee.edit', compact('employee', 'companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $validatedData = $request->validate([
            'company' => 'required|exists:companies,id',
            'first_name' => 'required|max:32',
            'last_name' => 'required|max:32',
            'email' => 'nullable|email',
            'phone' => 'nullable|digits:10'
        ]);


        
        $employee->company_id = $validatedData['company'];
        $employee->first_name = $validatedData['first_name'];
        $employee->last_name = $validatedData['last_name'];
        $employee->email = $validatedData['email'];
        $employee->phone = $validatedData['phone'];

        $employee->save();

        return redirect(route('employees.index'))->with('success', 'Employee has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();

        return redirect(route('employees.index'))->with('success', 'Employee has been deleted'); 
    }
}
