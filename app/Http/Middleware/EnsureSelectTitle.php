<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnsureSelectTitle
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasRole('user') && is_null($request->session()->get('id_title')) && is_null($request->session()->get('id_object'))) {
            return redirect('select-title');
        } else {
            if (isset(auth()->user()->url_image) && isset(auth()->user()->telephone) && isset(auth()->user()->gender) &&
                isset(auth()->user()->nation) && isset(auth()->user()->permanent_address) && isset(auth()->user->contact_address))
                return $next($request);
            else
                return redirect('input-info');
        }
        return $next($request);
    }
}
