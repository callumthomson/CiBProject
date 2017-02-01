<?php

namespace App\Http\Middleware;

use App\Repositories\APIToken;
use Closure;
use Auth;

class ApiAuthMiddleware
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
        $token = $request->input('_token');
        if(!$token) { // No token? Reject
            return response(null, 403);
        }
        $user = APIToken::getUser($token);
        if(!$user) { // No user matching the token? Reject
            return response(null, 403);
        }
        Auth::login($user);
        $response = $next($request);
        Auth::logout();
        return $response;
    }
}
