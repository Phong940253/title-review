<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidRequestDanhHieuDoiTuong
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
        $id_danhhieu_doituong = $request->input('id_danhhieu_doituong');
        $id_users = $request->input('id_users');

        // Validate
        $request->validate([
            'id_danhhieu_doituong' => ['string', 'required', 'exists:danhhieu_doituong,id'],
            'id_users' => ['string', 'required', 'exists:users,id'],
        ]);

        return $next($request);
    }
}
