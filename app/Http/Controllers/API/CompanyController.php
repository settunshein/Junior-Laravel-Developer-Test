<?php

namespace App\Http\Controllers\API;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return ResponseHelper::success(CompanyResource::collection($companies));
    }



    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'name'    => 'required',
                'email'   => 'required|email|unique:companies',
                'logo'    => 'nullable',
                'website' => 'nullable',
            ]);
            $company   = Company::create($validated);

            return ResponseHelper::success(new CompanyResource($company), 'New Company Created Successfully!', 201);

        } catch(ValidationException $e) {

            return ResponseHelper::error([], $e->getMessage(), 422);

        } catch(\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }



    public function show(string $id)
    {
        try {

            $company = Company::findOrFail($id);

            return ResponseHelper::success(new CompanyResource($company));

        } catch (ModelNotFoundException $e) {

            return ResponseHelper::error([], 'Company Not Found', 404);

        } catch (\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }



    public function update(Request $request, $id)
    {
        try {

            $validated = $request->validate([
                'name'    => 'required',
                'email'   => 'required|email|unique:companies,email,'.$id,
                'logo'    => 'nullable',
                'website' => 'nullable',
            ]);
            $company = Company::findOrFail($id);
            $company->update($validated);

            return ResponseHelper::success(new CompanyResource($company), 'New Company Updated Successfully!');

        } catch(ValidationException $e) {

            return ResponseHelper::error([], $e->getMessage(), 422);

        } catch (ModelNotFoundException $e) {

            return ResponseHelper::error([], 'Company Not Found', 404);

        } catch(\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }



    public function destroy(string $id)
    {
        try {

            $company = Company::findOrFail($id);
            $company->delete();

            return ResponseHelper::success($company, 'Company Deleted Successfully!');

        } catch (ModelNotFoundException $e) {

            return ResponseHelper::error([], 'Company Not Found', 404);

        } catch (\Exception $e) {

            return ResponseHelper::error([], $e->getMessage(), 500);

        }
    }
}
