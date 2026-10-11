<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses admin hanya untuk pengguna dengan role admin.');
        }

        return $next($request);
    }
}
