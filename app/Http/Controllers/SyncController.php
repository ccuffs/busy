<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function put(Request $request)
    {
        dd($request);
    }

    public function current(Request $request)
    {
        $node = $this->getNodeFromApiKey($request->api_key);

        return response()->json([
            'blah' => true,
            'message' => 'blah api key for sync node with name'
        ]);
    }

    private function getNodeFromApiKey($apiKey) {
        return null;
    }
}