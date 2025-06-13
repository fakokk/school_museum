<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeenAt
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            \Log::info('Updating last_seen_at for user: ' . Auth::id());
            Auth::user()->update(['last_seen_at' => now()]);
        }

        return $next($request);
    }
    
}