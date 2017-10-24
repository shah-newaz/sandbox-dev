<?php

namespace App\Http\Middleware;

use Closure;

class CreatorMiddleware
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
        $email  = auth()->user() ? auth()->user()->email : '';
        if ($email !== 'safiul@sagor.com') {
            return redirect()->back()->withError('Not authorized.');
        }
        return $next($request);
    }
}
