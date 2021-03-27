<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyTenantDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $domain = $request->getHost();
        // $tenant = Tenant::where('domain', $domain)->first();

        // if (!$tenant) {
        //     $adminDomain = config('app.admin_domain');
        //     abort_if($domain != $adminDomain, 404);
        // }

        // Append domain and tenant to the Request object
        // for easy retrieval in the application.
        // $request->merge([
        //     'domain' => $domain,
        //     'tenant' => $tenant
        // ]);

        // if ($tenant) {
        //     View::share('tenantColor', $tenant->color);
        //     View::share('tenantName', $tenant->name);
        // }

        return $next($request);
    }
}
