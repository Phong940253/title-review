<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidRequestAdmin
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
        if ($request->user()->hasRole('admin'))
            return $next($request);
        return redirect()->route('home');
    }
}
