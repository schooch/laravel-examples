<?php

namespace App\Http\Middleware;

use Closure;

class MustBeSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $plan)
    {
        // if the user is logged in AND
        // the user is currently subscribed to the site
        $user = $request->user();

        if($user && $user->subscribed($plan)){
             return $next($request);
        }


        return redirect('/');
    }
}
