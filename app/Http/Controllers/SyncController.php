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
        $this->middleware('apiAuth');
    }

    public function put(Request $request)
    {
        $log = array(
            'fk_user_id' => $request->fk_user_id,
            'ap'         => $request->ap,
            'ip'         => $request->ip,
            'loginTime'  => $request->loginTime,
            'wlan'       => $request->wlan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'syncd'      => true
        );

        try {
            $id = DB::table('logs')->insertGetId($log);
            return response()->json([
                'success' => true,
                'id'      => $id
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}