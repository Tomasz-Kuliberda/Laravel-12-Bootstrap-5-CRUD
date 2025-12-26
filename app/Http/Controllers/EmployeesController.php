<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'asc')->paginate(5);
        return view('employees.index', compact('employees'));
    }
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|unique:employees,email',
            'phone' => 'nullable|string|unique:employees,phone|min:5|max:17'
        ]);
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'company_id' => 'exists:companies,id',
            'email' => [
                'nullable',
                'email',
                Rule::unique('employees', 'email')->ignore($employee->id)
            ],
            'phone' => 'nullable|string|unique:employees,phone|min:5|max:17'
        ]);
        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
