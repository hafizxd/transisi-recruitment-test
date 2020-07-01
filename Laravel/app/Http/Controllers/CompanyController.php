<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    { 
        $companies = Company::orderBy('created_at', 'DESC')->paginate(5);

        return view('company.index', compact('companies'));
    }


    public function create()
    {
        return view('company.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email|unique:companies',
            'website' => 'required',
            'logo'    => 'required|image|mimes:png|dimensions:min_width=100,min_height=100|max:2000'
        ]);

        $logoName = time() . '.' . $request->file('logo')->extension();
        $request->file('logo')->storeAs('public/company', $logoName);

        Company::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'website' => $request->website,
            'logo'    => $logoName
        ]);

        return redirect()->route('companies.index');
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'website' => 'required',
            'logo'    => 'required|image|mimes:png|dimensions:min_width=100,min_height=100|max:2000'
        ]);

        $logoName = time() . '.' . $request->file('logo')->extension();
        $request->file('logo')->storeAs('public/company', $logoName);

        $company = Company::findOrFail($id);

        if ($company->logo !== 'default-logo.png') Storage::delete('public/company/' . $company->logo);
        
        $company->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'website' => $request->website,
            'logo'    => $logoName
        ]);

        return redirect()->route('companies.index');
    }
    

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo !== 'default-logo.png') Storage::delete('public/company/' . $company->logo);
        $company->delete();

        return redirect()->route('companies.index');
    }
}
