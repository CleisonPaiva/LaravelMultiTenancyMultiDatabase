<?php

namespace App\Http\Controllers\Tenant;

use App\DataTables\Logs\CompanyTable;
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
//        $company = $this->company->create([
//            'name'          => 'Empresa x ' . Str::random(5),
//            'subdomain'        => Str::random(5) . 'minhaempresa.com',
//            'bd_database'   => 'multi_tenant_default',
//            'bd_hostname'   => 'postgres',
//            'bd_username'   => 'default',
//            'bd_password'   => 'secret',
//        ]);
//
//        if (true)
//            event(new CompanyCreated($company));
//        else
//            event(new DatabaseCreated($company));
//
//        dd($company);
////dd($request->all());
        $company = $this->company->create($request->all());

//        if ($request->has('create_database'))
        if (true)
            event(new CompanyCreated($company));
//        else
//            event(new DatabaseCreated($company));

        return redirect()
            ->route('company.index')
            ->withSuccess('Cadastro realizado com sucesso!');

//        $company = $this->company->create([
//            'name'          => 'Empresa x ' . Str::random(5),
//            'subdomain'        => Str::random(5) . 'minhaempresa.com',
//            'db_database'   => 'testa',
//            'db_hostname'   => 'postgres-postgis',
//            'db_username'   => 'default',
//            'db_password'   => 'secret',
//        ]);
//
//        //Cria o database/checkbox
//        if (false) {
//            event( new CompanyCreated( $company ) );
//        }
//        //Se o banco ja estiver criado executa so as migrates,
////        se tiver em outro servidor precisa alternar a conexao
//        else {
//            event( new DatabaseCreated( $company ) );
//        }

//        dd($company);
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
//        // $company = $this->company->find($id);
//        $company = $this->company->where('subdomain', $domain)->first();
//
//        if (!$company)
//            return redirect()->back();
//
//        return view('tenants.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  int  $id
     * @return Response
     */
    public function update(StoreUpdateCompanyFormRequest $request, $id)
    {
//        if (!$company = $this->company->find($id))
//            return redirect()->back()->withInput();
//
//        $company->update($request->all());
//
//        return redirect()
//            ->route('company.index')
//            ->withSuccess('Atualizado com sucesso!');
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
