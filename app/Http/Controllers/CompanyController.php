<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email',
            'website' => 'required|url|unique:companies,website',
            'logo' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('logo', $filename, 'public');
            $validate['logo'] = $path;
        }

        Company::create($validate);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }
    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }
    public function update(Request $request, Company $company)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'website' => 'required|url|unique:companies,website,' . $company->id,
            'logo' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
        ]);
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::delete($company->logo);
            }
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('logo', $filename, 'public');
            $validate['logo'] = $path;
        }
        $company->update($validate);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::delete($company->logo);
        }
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
