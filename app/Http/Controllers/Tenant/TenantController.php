<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TenantController extends Controller
{
//    public function datatable(Request $request)
//    {
//        try {
//
//
//            $model = Company::all();
//
//
//            return DataTables::eloquent($model)
//
//                ->filter(function ($query) use ($request) {
//
//                })
//                ->make(true);
//
//        } catch (\Exception $e) {
//            return null;
//        }
//    }
    public function index()
    {
//        dd('def');
        return view('tenants.home.index');
    }
}
