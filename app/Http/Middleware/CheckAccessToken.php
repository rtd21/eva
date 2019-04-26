<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use DB;

class CheckAccessToken
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
        $token = DB::table('oauth_access_tokens')
                    ->where('id', $request->bearerToken())
                    ->first();
        if (is_null($token)) {
            return response()->json([
                'message' => 'Unauthenticated'
            ]);
        }
        return $next($request);
    }
}
