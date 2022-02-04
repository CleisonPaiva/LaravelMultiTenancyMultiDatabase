<?php

namespace App\Http\Controllers\Tenant;

use App\Events\Tenant\DatabaseCreated;
use App\Http\Requests\Tenant\StoreUpdateCompanyFormRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tenant\CompanyCreated;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
    public function datatable(Request $request)
    {
        try {
            $companies = $this->company ->select('id','name','subdomain','db_database');

            return Datatables::of($companies)
                ->filter(function ($query) use ($request) {
//                    if ($request->has('nome')) {
//                        $query->where('commom_companies.nome', 'ilike', "%{$request->get('nome')}%");
//                    }
                })
                ->make(true);
        } catch (\Exception $e) {
            return null;
        }
    }


    public function index()
    {
        return view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *

    //     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $company = $this->company->create($request->all());


//        {dd('ri');}

//        if (true)
        if ($request->has('createdatabase'))
            event(new CompanyCreated($company));
        else
            event(new DatabaseCreated($company));

        return redirect()
            ->route('company.index')
            ->withSuccess('Cadastro realizado com sucesso!');

    }
//    public function index()
//    {
//        dd('aqui');
//        $companies = $this->company->latest()->paginate();
//
//        return view('tenants.companies.index', compact('companies'));
//    }


    /**
     * Display the specified resource.
     *
     * @param  string  $domain
     * @return Response
     */
    public function show($domain)
    {
        dd('show');
        // $company = $this->company->find($id);
        $company = $this->company->where('subdomain', $domain)->first();

//        if (!$company)
//            return redirect()->back();

//        return view('tenants.companies.show', compact('company'));
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $domain
     * @return Response
     */
    public function edit($domain)
    {

         $company = $this->company->find($domain);
//        $company = $this->company->where('subdomain', $domain)->first();
//        dd($company);
        if (!$company)
            return redirect()->back();


        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (!$company = $this->company->find($id))
            return redirect()->back()->withInput();

        $company->update($request->all());

        return redirect()
            ->route('company.index')
            ->withSuccess('Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        if (!$company = $this->company->find($id))
            return redirect()->back();

        $company->delete();

        return redirect()
            ->route('company.index')
            ->withSuccess('Deletado com sucesso!');
    }
}
