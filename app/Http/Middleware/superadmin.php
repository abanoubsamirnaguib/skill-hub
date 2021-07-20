<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class superadmin
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
        if (Auth::user()){
            $RoleStatus = Auth::user()->role->name;
        if ( $RoleStatus == 'superadmin'){
            return $next($request);
        }
        else return redirect(url("/SkillsHub/Dashboard/") );
    }
        else return redirect(url("/SkillsHub/home") );
    }
}
