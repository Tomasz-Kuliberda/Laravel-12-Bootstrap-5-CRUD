<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies = Company::orderBy('created_at', 'asc')->paginate(5);
        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'nullable|email|unique:companies,email',
            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                Rule::dimensions()->minWidth(100)->minHeight(100)
            ],
            'website' => 'nullable|string'
        ]);
        if ($request->hasFile("logo"))
        {
            $validated["logo"] = $request->file("logo")->store("logos", "public");
        }
        Company::create($validated);
        return redirect()->route('companies.index')->with('success', 'Company added successfully');
    }
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'nullable',
                'email',
                Rule::unique('companies', 'email')->ignore($company->id)
            ],
            'logo' => "nullable|image|mimes:jpg,png",
            'website' => "nullable|string"
        ]);
        if ($request->hasFile("logo"))
        {
             if($request->logo && Storage::disk("public")->exists($request->logo)){
                Storage::disk("public")->delete($request->logo);
            }
            $validated["logo"] = $request->file("logo")->store("logos","public");
        }
        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }
    public function destroy(Company $company)
    {
        if ($company->logo && Storage::exists($company->logo)) {
            Storage::delete($company->logo);
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
