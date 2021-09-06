<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\CompanyProfileResource;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Resources\ProfileCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyProfileController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'name'=> 'nullable|string',
            'limit'=> 'nullable|integer',
            'address'=> 'nullable|string'
        ]);

        $comp = Company::with(['supervisors' => function($query){
            $query->without('company');
        }]);

        if($request->name)
        {
            $comp->where('comp_name','LIKE','%'.$request->name.'%');
        }

        if($request->address)
        {
            $comp->where('comp_address','LIKE','%'.$request->address.'%');
        }

        $request->has('limit') ? $limit = $request->limit : $limit = 12;

        $lists = $comp->latest()->paginate($limit);

        return new ProfileCollection(CompanyProfileResource::collection($lists),$lists);
    }

    public function store(StoreCompanyProfileRequest $request)
    {
        $comp = Company::firstOrCreate($request->validated());
        
        return (CompanyProfileResource::make($comp))
        ->additional(['message'=>'saved']);
    }

    public function update($id,UpdateCompanyProfileRequest $request)
    {
        Company::findOrFail($id)->update($request->validated());
        
        return (CompanyProfileResource::make(Company::find($id)))
        ->additional(['message'=>'updated']);
    }

    public function show(Company $company)
    {
        $comp = $company->with(['supervisors' => function($query){
            $query->without('company');
        }])->findOrFail($company->id);

        return new CompanyProfileResource($comp); 
    }

    public function destroy($id)
    {
        $comp = Company::findOrFail($id);
        
        Company::with(['supervisors' => function($query) use($id) {
            $query->where('company_id',$id)->update(['company_id' => 1]);
        }])->findOrFail($id)->delete();

        return (CompanyProfileResource::make($comp))
        ->additional(['message'=>'deleted']);
    }

}
