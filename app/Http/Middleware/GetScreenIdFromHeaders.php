<?php

namespace App\Http\Middleware;

use Closure;
use App\Screen;

class GetScreenIdFromHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $screenCode = $request->header("PlanniScreenCode");
        $screen = Screen::where('code', $screenCode)->first();
        if ($screen) {
            $request['screen'] = $screen;
            return $next($request);
        } else abort(403, 'Unauthorized action');

    }
}
