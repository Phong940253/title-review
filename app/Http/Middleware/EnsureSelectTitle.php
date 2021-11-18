<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EnsureSelectTitle
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->can('chọn đề cử') && is_null($request->session()->get('id_title')) && is_null($request->session()->get('id_object')))
            return redirect()->route('select-title');
        return $next($request);
    }
}
