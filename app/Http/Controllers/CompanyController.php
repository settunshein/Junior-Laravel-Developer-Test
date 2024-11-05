<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Traits\UploadFile;
use App\Traits\DeleteFile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use uploadFile, DeleteFile;

    public function index()
    {
        $companies = Company::latest()->paginate(3);
        $companies->appends(request()->all());

        return view('company.index', compact('companies'))
        ->with('i', (request()->input('page', 1) - 1) * 3);
    }


    public function create()
    {
        return view('company.form');
    }


    public function store(Request $request)
    {
        $company = Company::create($request->except(['logo']));

        if ($request->hasFile('logo')) {
            $file_name = $this->uploadFile($request->file('logo'), 'company');
            $company->update(['logo' => $file_name]);
        }

        return to_route('company.index')->with('success', 'New Company Created Successfully!');
    }


    public function edit(Company $company)
    {
        return view('company.form', compact('company'));
    }


    public function update(Request $request, Company $company)
    {
        $company->update($request->except(['logo']));

        if ($request->hasFile('logo')) {
            $this->deleteFile($company->logo, 'company');
            $file_name = $this->uploadFile($request->file('logo'), 'company');
            $company->update(['logo' => $file_name]);
        }

        return to_route('company.index')->with('success', 'Company Updated Successfully!');
    }


    public function destroy(Company $company)
    {
        $this->deleteFile($company->logo, 'company');
        $company->delete();

        return back()->with('success', 'Company Deleted Successfully!');
    }
}
