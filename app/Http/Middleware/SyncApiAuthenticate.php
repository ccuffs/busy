<?php

namespace App\Http\Middleware;

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
        $apiKey = $request->api_key;
        $node = $this->getNodeFromApiKey($apiKey);
    
        if($node == null) {
            return response()->json([
                'error' => true,
                'message' => 'Invalid api key for sync node with name "' . $request->name . '".'
            ]);
        }
    
        return $next($request);
    }

    private function getNodeFromApiKey($apiKey) {
        return null;
    }
}
