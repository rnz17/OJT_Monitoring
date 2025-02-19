<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and is a professor
        if (Auth::check() && Auth::user()->professor) {
            return $next($request);
        }

        // Redirect unauthorized users to client landing with a message
        return redirect()->route('client.landing')->with('error', 'Access denied.');
    }
}
