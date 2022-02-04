<?php

namespace App\Http\Middleware\Tenant;

use App\Models\Company;
use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle( Request $request, Closure $next )
    {
//        dd($request);
        $manager=  app(ManagerTenant::class);

        if($manager->domainIsMain()){
            return $next( $request );
        }

        list( $subdomain ) = explode( '.', $request -> getHost(), 2 );
        $company = $this -> getCompany( $subdomain );

//        dd( $subdomain );


//        Se n encontrar empresa
//        if(is_null($company))
        if(!$company && $request->url() != route('error_404'))
        {
            abort(404);
//            return redirect()->route('error_404');

        }else if($request->url() != route('error_404') && !$manager->domainIsMain()){

            $manager->setConnection($company);

        }
        return $next( $request );
    }

    public function getCompany( $subdomain )
    {
        return Company ::where( 'subdomain', $subdomain ) -> first();
    }
}
