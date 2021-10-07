<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class FillInformationProfile
{

    /**
     * @return bool
     */
    public static function isFillInformation(): bool
    {
        return isset(auth()->user()->telephone) && isset(auth()->user()->gender) &&
            isset(auth()->user()->nation) && isset(auth()->user()->id_religion) &&
            isset(auth()->user()->id_province) && isset(auth()->user()->id_district) &&
            isset(auth()->user()->id_ward) && isset(auth()->user()->street) &&
            isset(auth()->user()->id_current_province) && isset(auth()->user()->id_current_district) &&
            isset(auth()->user()->id_current_ward) && isset(auth()->user()->current_street);
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->can('để trống thông tin')) {
            Log::debug('Fill Information');
            return $next($request);
        }
        else if (//                isset(auth()->user()->url_image) &&
            $this->isFillInformation())
            return $next($request);
        else {
            return redirect('input-info');
        }

    }
}
