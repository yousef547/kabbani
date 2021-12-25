<?php

namespace App\Http\Middleware;

use App\Models\Api_admin;
use Closure;

class IsApiUser
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
        if($request->has('access_token'))
        {
            if($request->access_token !== null)
            {
                $user = Api_admin::where('access_token' , $request->access_token)->first();
                if($user !== null)
                {
                    return $next($request);
                }
                else
                {
                    return response()->json('Access token is not correct');
                }
            }
            else 
            {
                return response()->json('Access token is empty');
            }
        }
        else 
        {
            return response()->json('There is not access token');
        }
        
    }
}
