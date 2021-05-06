<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $token = '6d8aff75d21574823842b239f64aecf015a020a5756b9a06add4ec8e718bbbd5';
        $received_token = substr($request->header('Authorization'), 7);
        if($received_token != $token){
            return response('Unauthorized. Please contact admin for further information',401);
        }

        return $next($request);
    }
}
