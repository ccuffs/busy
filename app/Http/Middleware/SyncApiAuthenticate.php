<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;

class SyncApiAuthenticate
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
        $node = DB::table('syncs')->where('api_key', $request->api_key)->first();
    
        if($node == null) {
            return response()->json([
                'error' => true,
                'message' => 'Invalid api key.'
            ]);
        }
    
        return $next($request);
    }
}
