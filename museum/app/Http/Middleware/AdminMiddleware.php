<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //здесь мы должны проверить, является ли пользователь админом 
        //чтоюы впустить его в админку
        // auth()->user()->name;
        if ((int)auth()->user()->role !== User:: ROLE_ADMIN){
            abort(404);
        }

        return $next($request);
    }
}
