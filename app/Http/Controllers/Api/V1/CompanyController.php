<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function getCompanies() 
    {
        $companies = Company::orderBy('comp_name','asc')->get();

        return CompanyResource::collection($companies);
    }
}
