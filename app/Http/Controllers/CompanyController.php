<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $companies = Company::select('id', 'name', 'email', 'phone', 'website', 'created_at')->filter()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function new()
    {
        return view('companies.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:companies',
            'phone' => ['required', 'string'],
        ]);

        $company = Company::create($request->all());

        $company->save();
        return redirect('/companies')->with('success', 'Company created successfully');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Company $company, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string'],
        ]);

        $company->update($request->all());

        return redirect('/companies')->with('warning', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect('/companies')->with('danger', "Company deleted successfully");
    }
}
