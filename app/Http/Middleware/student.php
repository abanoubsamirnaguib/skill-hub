<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class student
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
        $RoleStatus = Auth::user()->role->name;
        if ($RoleStatus == 'student' ){
            return $next($request);
        }
        else return redirect(url("/SkillsHub/home") );
    }
}
